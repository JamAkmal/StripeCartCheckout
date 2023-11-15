<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .success-icon {
            font-size: 3em;
            color: #28a745;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        .order-details {
            margin-top: 20px;
        }

        .back-to-home {
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">&#10003;</div>
        <h1 class="mt-3">Order Placed Successfully!</h1>
        <p class="mt-3">Thank you for your purchase. Your order has been successfully placed.</p>

        <div class="order-details mt-4">
            <!-- Display order details here, such as order number, date, and total -->
            <p>Order Number: <strong>#12345</strong></p>
            <p>Date: <strong>November 14, 2023</strong></p>
            <p>Total Amount: <strong>$100.00</strong></p>
        </div>

        <div class="back-to-home mt-4">
            <p>Back to <a href="/">Home</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH E:\Laravel10\ShoppingCart\resources\views/checkout-success.blade.php ENDPATH**/ ?>