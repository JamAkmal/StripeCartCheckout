

<?php $__env->startSection('content'); ?>
<h2 class="mb-3 text-center"> Add To  Cart</h2>
<table id="cart" class="table table-borderd table-hover">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if(session('cart')): ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr rowID="<?php echo e($id); ?>">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3" hidden-xs>
                                <img src="<?php echo e(asset('images')); ?>/<?php echo e($details['image']); ?>" class="card-img-top" height="100" width="80">
                            </div>
                            <div class="col-sm-9">
                                <h4 class="normagin"> <?php echo e($details['name']); ?></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">$<?php echo e($details['price']); ?></td>
                    
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td  class="text-start">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i> Continue Shopping</a>
            </td>
            <td colspan="2" class="text-end">
                <form action="<?php echo e(route('checkout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button>
                </form>
            </td>

        </tr>
    </tfoot>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
   $('.delete-product').click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Do you really want to delete ?")){
            $.ajax({
                url: "<?php echo e(route('delete.cart.product')); ?>",
                method: "DELETE",
                data : {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id: ele.parents("tr").attr("rowID")
                },
                success: function (response){
                    window.location.reload();
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel10\ShoppingCart\resources\views/cart.blade.php ENDPATH**/ ?>