


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
                     

                   

                    <div class="card-footer p-3">





                        <!-- Heading -->
                        <h6 class="mb-7 h5 mt-4">Order Items (<?php echo e($orderItemsCount); ?>)</h6>


                        <!-- Divider -->
                        <hr class="my-3">

                        <!-- List group -->
                        <ul>
                            <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <div class="row align-items-center">

                                        <div class="col-4 col-md-3 col-xl-2">
                                            <?php
                                                $productImage = getProductImage($orderItem->product_id);
                                            ?>

                                            <?php if(!empty($productImage->image)): ?>
                                                <img class="img-fluid" src="<?php echo e(asset('uploads/product/'.$productImage->image)); ?>"  >
                                            <?php else: ?>
                                                <img class="img-fluid" src="<?php echo e(asset('admin-assets/img/default-150x150.png')); ?>"  >
                                            <?php endif; ?>
                                        </div>

                                        <div class="col">
                                            <!-- Title -->
                                            <p class="mb-4 fs-sm fw-bold">
                                                <a class="text-body" href="product.html"><?php echo e($orderItem->name); ?> x <?php echo e($orderItem->qty); ?></a> <br>
                                                <span class="text-muted">$<?php echo e($orderItem->total); ?>  </span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>                      
                </div>
                
                <div class="card card-lg mb-5 mt-3">
                    <div class="card-body">
                        <!-- Heading -->
                        <h6 class="mt-0 mb-3 h5">Order Total</h6>

                        <!-- List group -->
                        <ul>
                            <li class="list-group-item d-flex">
                                <span>Subtotal</span>
                                <span class="ms-auto">$<?php echo e(number_format($order->subTotal,2)); ?></span>
                            </li>
                        </ul>
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






</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/account/order-detail.blade.php ENDPATH**/ ?>