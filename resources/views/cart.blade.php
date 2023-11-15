@extends('shop')

@section('content')
<h2 class="mb-3 text-center"> Add To  Cart</h2>
<table id="cart" class="table table-borderd table-hover">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            {{-- <th>Total</th> --}}
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <tr rowID="{{ $id}}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3" hidden-xs>
                                <img src="{{asset('images')}}/{{$details['image']}}" class="card-img-top" height="100" width="80">
                            </div>
                            <div class="col-sm-9">
                                <h4 class="normagin"> {{$details['name']}}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{$details['price']}}</td>
                    {{-- <td data-th="Subtotal" class="text-center"></td> --}}
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td  class="text-start">
                <a href="{{ url('/')}}" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i> Continue Shopping</a>
            </td>
            <td colspan="2" class="text-end">
                <form action="{{ route('checkout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button>
                </form>
            </td>

        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">
   $('.delete-product').click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Do you really want to delete ?")){
            $.ajax({
                url: "{{ route('delete.cart.product')}}",
                method: "DELETE",
                data : {
                    _token: "{{ csrf_token()}}",
                    id: ele.parents("tr").attr("rowID")
                },
                success: function (response){
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection