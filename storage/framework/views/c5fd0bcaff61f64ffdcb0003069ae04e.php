
<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="<?php echo e(asset('images')); ?>/<?php echo e($book->image); ?>" class="card-img-top" alt="Book Cover">
            <div class="card-body">
                <h4 class="card-title"><?php echo e($book->name); ?></h4>
                <p> <?php echo e($book->author); ?></p>
                <p class="card-text"> <strong>Price: </strong> $<?php echo e($book->price); ?></p>
                <p class="btn-holder"><a href="<?php echo e(route('addbook.to.cart', $book->id)); ?>" class="btn btn-outline-danger">Add to <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel10\ShoppingCart\resources\views/products.blade.php ENDPATH**/ ?>