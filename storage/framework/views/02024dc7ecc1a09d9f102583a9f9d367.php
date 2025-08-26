<?php $__env->startSection('link'); ?>





<?php $__env->stopSection(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/slick.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/slick-theme.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/ion.rangeSlider.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/style.css')); ?>" />

<?php $__env->startSection('content'); ?>


 

<section class=" section-11 ">
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-3">
                <?php echo $__env->make('account.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <div class="card">

                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">My Wishlist</h2>
                    </div>
 

                    <div class="card-body p-4">

                        <?php if($wishlists->isNotEmpty()): ?>
                            <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                        <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="<?php echo e(route('user.shop',$wishlist->product->slug)); ?>" style="width: 10rem;">
                                            <?php
                                                $productImage = getProductImage($wishlist->product_id)
                                            ?>
                                            <?php if(!empty($productImage)): ?>
                                                <img class="card-img-top" src="<?php echo e(asset('uploads/product/'.$productImage->image)); ?>"  >
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('admin-assets/img/default-150x150.png')); ?>"  >
                                            <?php endif; ?>
                                            
                                            
                                        </a>
                                        <div class="pt-2">
                                            <h3 class="product-title fs-base mb-2"><a href="<?php echo e(route('user.shop',$wishlist->product->slug)); ?>"><?php echo e($wishlist->product->title); ?></a></h3>                                        
                                            <div class="fs-lg text-accent pt-2">
                                                <span class="h5"><strong>$<?php echo e($wishlist->product->price); ?></strong></span>
                                                <?php if( $wishlist->product->compare_prose > 0): ?>
                                                    <span class="h6 text-underline"><del>$<?php echo e($wishlist->product->compare_prose); ?></del></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                        <button onclick="removeProduct(<?php echo e($wishlist->product_id); ?>)" class="btn btn-outline-danger btn-sm" type="button"><i class="fas fa-trash-alt me-2"></i>Remove</button>
                                    </div>
                                </div>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div >
                                <h3 class="h5">Your wishlist is empty!!</h3>
                            </div>
                        <?php endif; ?>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



<?php $excludeSection = 'footer'; ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>

<script src="<?php echo e(asset('assets/js/bootstrap.bundle.5.1.3.min.js')); ?>"></script>
 



<script>


function removeProduct(id){
    $.ajax({
        url: '<?php echo e(route("account.removeProductFromWishlists")); ?>', 
        type: 'post',
        data: {id:id},
        datatype: 'json',
        success: function(response){
            if(response.status == true){
                window.location.href = "<?php echo e(route('account.wishlist')); ?>";
            }
            console.log('hrllo .pprrroop');
        }
    });
}



</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/account/wishlist.blade.php ENDPATH**/ ?>