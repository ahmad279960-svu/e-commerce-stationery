 

<?php $__env->startSection('content'); ?>
 

    <style>
        tr.clickable-row {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        tr.clickable-row:hover {
            background-color: #4b4e51;  
            transform: scale(1.01); 
        }
    </style>

    <div class="card-body">
        
        <!-- Table with stripped rows -->
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
            <div class="datatable-top">
            <div class="datatable-dropdown">
                <button type="button" onclick="window.location.href='<?php echo e(route("orders.index")); ?>'" class="btn btn-default btn-sm btn-primary">Reset</button>
            </div>
            <div class="datatable-search">
                
                <form action="<?php echo e(route('orders.index')); ?>" method="GET">
                    <input class="datatable-input" value="<?php echo e(Request::get('Keyword')); ?>" placeholder="Search..." type="text" id="Keyword" name="Keyword" title="Search within table">
                    <button type="submit" class="btn btn-success">Search</button>
                </form>     
            </div>
        </div>
        <div class="datatable-container">
            <table class="table datatable datatable-table">
                <thead>
                    <tr>
                        <th data-sortable="true" style="width: 15.86466165413534%;">
                            <button class="datatable-sorter">Customer</button>
                        </th>
                        <th data-sortable="true" style="width: 20.86466165413534%;">
                            <button class="datatable-sorter">Email</button>
                        </th>
                        <th data-sortable="true" style="width: 20.86466165413534%;">
                            <button class="datatable-sorter">Phone</button>
                        </th>
                        <th data-sortable="true" class="red" style="width: 22.55639097744361%;">
                            <button class="datatable-sorter">Date Purchased</button>
                        </th>   
                    </tr>
                </thead>
             <tbody>
                <?php if($orders->isNotEmpty()): ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="clickable-row" data-index="0" onclick="window.location='<?php echo e(route('orders.detail', $order->id)); ?>'" style="cursor: pointer;">
                            
                        <td><?php echo e($order->name); ?></td>
                        <td><?php echo e($order->email); ?></td>
                        <td><?php echo e($order->mobile); ?></td>
                        <td>
                            <?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d M, Y')); ?>

                        </td>
                    
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Record Not Found</td>
                    </tr>
                <?php endif; ?>
             </tbody>
        </table>
        </div>
            <div class="datatable-bottom">
                
            </div>
        </div>
            <!-- End Table with stripped rows -->

    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>
<script>

</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/admin/orders/list.blade.php ENDPATH**/ ?>