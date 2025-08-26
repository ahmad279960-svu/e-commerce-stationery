 

<?php $__env->startSection('content'); ?>
 
    <div class="card-body">
        
        <!-- Table with stripped rows -->
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
            <div class="datatable-top">
            <div class="datatable-dropdown">
                <a href="<?php echo e(route('product.create')); ?>" class="btn btn-primary">New Product</a>
            </div>
            <div class="datatable-search">
                
                <form action="<?php echo e(route('product.index')); ?>" method="GET">
                        <button type="button" onclick="window.location.href='<?php echo e(route("product.index")); ?>'" class="btn btn-default btn-sm">Reset</button>
                    <input class="datatable-input" value="<?php echo e(Request::get('Keyword')); ?>" placeholder="Search..." type="text" id="Keyword" name="Keyword" title="Search within table">
                    <button type="submit" class="btn btn-success">Search</button>
                </form> 
            </div>
        </div>
        <div class="datatable-container">
            <table class="table datatable datatable-table">
                <thead>
                    <tr>
                        <th data-sortable="true" style="width: 20.86466165413534%;">
                            <button class="datatable-sorter">Title</button>
                        </th>

                        <th data-sortable="true" style="width: 20.86466165413534%;">
                            <button class="datatable-sorter">Slug</button>
                        </th>

                        <th data-sortable="true" style="width: 15%;">
                            <button class="datatable-sorter">Price</button>
                        </th>


                        <th data-sortable="true" style="width: 15%;">
                            <button class="datatable-sorter">Quantity</button>
                        </th>

                        <th data-sortable="true" class="red" style="width: 15%;">
                            <button class="datatable-sorter">Status</button>
                        </th>   
                        <th data-sortable="true" class="red" style="width: 15%;">
                            <button class="datatable-sorter">Action</button>
                        </th>   
                    </tr>
                </thead>
             <tbody>
                <?php if($products->isNotEmpty()): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-index="0">
                        
                    <td><?php echo e($product->title); ?></td>
                    <td><?php echo e($product->slug); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->qty); ?></td>

                    
                    <td>
                        <?php if($product->status == 1): ?>
                        <svg class="text-success-500 h-6 w-6 text-success" style="height: 30px;width: 30px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <?php else: ?>
                            <svg class="text-danger h-6 w-6" style="height: 30px;width: 30px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('product.edit',$product->id)); ?>">
                            <svg class="filament-link-icon w-4 h-4 mr-1" style="height: 30px;width: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                        </a>
                        <a href="#"  onclick="deleteProduct(<?php echo e($product->id); ?>)" class="text-danger w-4 h-4 mr-1">
                            <svg wire:loading.remove.delay="" style="height: 30px;width: 30px;"  wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
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
    function deleteProduct(id) {

        var url = '<?php echo e(route('product.destroy',"ID")); ?>'
        var newUrl = url.replace("ID",id);



        if(confirm("Are you suer you want to delete")){
            $.ajax({
                url: newUrl,
                type: 'delete',
                data: {} ,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },success: function(response) {
                    if(response["status"]){
                        window.location.href = "<?php echo e(route("product.index")); ?>";
                    }

                }

            });
        }

}
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/admin/Product/list.blade.php ENDPATH**/ ?>