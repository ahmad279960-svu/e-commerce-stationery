 
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/slick.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/slick-theme.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/ion.rangeSlider.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css2/style.css')); ?>" />


<?php $__env->startSection('content'); ?>


<?php $excludeSection = 'footer'; ?>

<section class=" section-11 ">
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-3">
                <?php echo $__env->make('account.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <div class="card">

                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">My Order</h2>
                    </div>

                    <div class="card-body p-4">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead> 
                                        <tr>
                                            <th>Orders #</th>
                                            <th>Date Purchased</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                        <?php if($orders->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <td>
                                                        <a href="<?php echo e(route('account.orderDetail',$order->id)); ?>"><?php echo e($order->id); ?></a>
                                                    </td>
                                                    <td> <?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d M, Y')); ?></td>
                                                    
                                                    <td>$<?php echo e(number_format($order->subTotal,2)); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="3">Orders Not Found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




<br>
<br>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>

<script src="<?php echo e(asset('assets/js/bootstrap.bundle.5.1.3.min.js')); ?>"></script>
 



<script>






</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/account/order.blade.php ENDPATH**/ ?>