



<?php $__env->startSection('content'); ?>
 
    <div class="card-body">
        
        <!-- Table with stripped rows -->
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
            <div class="datatable-top">
            <div class="datatable-dropdown">
                <a href="<?php echo e(route('governorate.create')); ?>" class="btn btn-primary">New Governorate</a>
            </div>
            <div class="datatable-search">
                
                <form action="<?php echo e(route('governorate.index')); ?>" method="GET">
                        <button type="button" onclick="window.location.href='<?php echo e(route("governorate.index")); ?>'" class="btn btn-default btn-sm">Reset</button>
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
                            <button class="datatable-sorter">Name</button>
                        </th>
                        <th data-sortable="true" style="width: 20.86466165413534%;">
                            <button class="datatable-sorter">Orders</button>
                        </th>
                        <th data-sortable="true" class="red" style="width: 22.55639097744361%;">
                            <button class="datatable-sorter">Action</button>
                        </th>   
                    </tr>
                </thead>
             <tbody>
                <?php if($governorates->isNotEmpty()): ?>
                <?php $__currentLoopData = $governorates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $governorate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-index="0">
                        
                    <td><?php echo e($governorate->name); ?></td>
                    
                    <td>0</td>

                    <td>
                        <a href="#"  onclick="deleteGovernorate(<?php echo e($governorate->id); ?>)" class="text-danger w-4 h-4 mr-1">
                            <svg wire:loading.remove.delay="" style="height: 30px;width: 30px;"  wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http: www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
      function deleteGovernorate(id) {

          var url = '<?php echo e(route('governorate.destroy',"ID")); ?>'
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
                          window.location.href = "<?php echo e(route("governorate.index")); ?>";
                      }
                  }
              });
          }
  }
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/admin/governorate/list.blade.php ENDPATH**/ ?>