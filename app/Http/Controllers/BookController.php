<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view("products",compact("books"));
    }

    public function addToCart($id){
        $book = Book::findOrFail($id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'name' => $book->name,
                'price'=> $book->price,
                'quantity' => 1,
                'image' => $book->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Book has been added to cart');

    }

    public function BookCart(){
        return view('cart');
    }


    // starting chekout functionalities with Stripe
    public function Checkout(){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $cartItems = session('cart', []);

        $lineItems = [];
        $totalPrice = 0;
        foreach ($cartItems as $productId => $details) {
            $product = Book::find($productId);
        if ($product) {
            $totalPrice += $product->price * $details['quantity'];

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                        // Add other product data as needed
                    ],
                    'unit_amount' => $totalPrice * 100,
                ],
                'quantity' => $details['quantity'],
            ];
        }
    }
        $session = \Stripe\Checkout\Session::create([
            'line_items' =>  $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success',[],true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel',[],true),
          ]);

          $order = new Order();
          $order->status = 'unpaid';
          $order->tottalPrice = $totalPrice;
          $order->session_id = $session->id;
          $order->save();


          return redirect($session->url);
    }
    // if payment done successfully
    public function success(Request $request){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionid = $request->get('session_id');
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionid);
            if(!$session){
                throw new NotFoundHttpException;
            }
            $customer = \Stripe\Customer::retrieve($session->customer);
            $order = Order::WHERE('session_id',$session->id)->where('status','unpaid')->first();
            if(!$order){
                throw new NotFoundHttpException;
            }
            $order->status = 'paid';
            $order->save();
            return view('checkout-success',compact('customer'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException;
        }
    }

    // if payment NOT done successfully
    public function cancel(){
        return view('checkout-cancel');
    }

    // Ending Strip functionalities
    public function DeleteProduct(Request $request){
       if($request->id){
        $cart = session()->get('cart');
       if(isset($cart[$request->id])){
        unset( $cart[$request->id] );
        session()->put('cart', $cart);
       }
       session()->flash('success','Book has been successfully deleted...');
       }
    }
}
