 

<?php $__env->startSection('content'); ?>
 
        
        <!-- Table with stripped rows -->
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         
        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
            <div class="datatable-top">
            <div class="datatable-dropdown">
            </div>
            <div class="datatable-search">
                <button type="button" onclick="window.location.href='<?php echo e(route("orders.index")); ?>'" class="btn btn-default btn-sm btn-success">back </button>
            </div>
        </div>


        

 

        <div class="container my-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <!-- عنوان الفاتورة -->
                    <h2 class="text-center text-primary mb-4">Order details</h2>
        
                    <!-- بيانات العميل -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold">Customer Information</h5>
                            <p class="mb-1"><strong>Name:</strong> <?php echo e($order->user->name); ?></p>
                            <p class="mb-1"><strong>Email:</strong> <?php echo e($order->user->email); ?></p>
                            <p class="mb-1"><strong>Phone:</strong> <?php echo e($order->mobile); ?></p>
                            <p class="mb-1"><strong>Address:</strong> <?php echo e($order->address); ?></p>
                            <?php if(!empty($order->notes)): ?>
                                <p class="mb-1"><strong>Notes:</strong> <?php echo e($order->notes); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5 class="fw-bold">Order Details</h5>
                            <p class="mb-1"><strong>Order ID:</strong> <?php echo e($order->id); ?></p>
                            <p class="mb-1"><strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d M, Y h:i A')); ?></p>
                            
                        </div>
                    </div>
        
                    <!-- جدول المنتجات -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($orderItem->id); ?></td>
                                        <td><?php echo e($orderItem->name); ?></td>
                                        <td><?php echo e($orderItem->qty); ?></td>
                                        <td>$<?php echo e($orderItem->price); ?></td>
                                        <td>$<?php echo e($orderItem->total); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                        </table>
                    </div>
        
                    <!-- الإجمالي والتفاصيل -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h4 class="fw-bold text-danger">Total: $<?php echo e(number_format($order->subTotal, 2)); ?></h4>
                        </div>
                    </div>
        
                     
                </div>
            </div>
        </div>



        

<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>
<script>

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/admin/orders/detail.blade.php ENDPATH**/ ?>