<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Add To Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">My-Collections</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
              <a class="nav-link" href="#" disabled>Features</a>
              <a class="nav-link" href="#" disabled>Pricing</a>
            </div>
          </div>
        </div>
        <a href="<?php echo e(route('shopping.cart')); ?>" class="btn btn-sm btn-outline-dark">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart <span class="badge bg-danger"><?php echo e(count((array) session('cart'))); ?></span>
        </a>
      </nav>
</div>
    <div class="container mt-5">
        <h2 class="mb-3 text-center">Laravel Add To Shopping Cart</h2>
        <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !</strong> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH E:\Laravel10\ShoppingCart\resources\views/shop.blade.php ENDPATH**/ ?>