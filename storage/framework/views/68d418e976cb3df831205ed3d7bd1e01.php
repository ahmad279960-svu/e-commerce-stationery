




<?php $__env->startSection('content'); ?>
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">No Labels / Placeholders as labels Form</h5>

        <!-- No Labels Form -->
        <form class="row g-3" method="POST" name="categoryForn" id="categoryForn">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="name" name="name" id="name">
                <p></p>
            </div>
             
             
            
            <div class="">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="<?php echo e(route('governorate.index')); ?>" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        <!-- End No Labels Form -->

    </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>
    


    <script>
        
$("#categoryForn").submit(function(event) {
  event.preventDefault();

  var element = $(this);
  var formData = element.serialize();


  $("button[type=submit]").prop('disabled',true)
  $.ajax({
    url: '<?php echo e(route("governorate.store")); ?>',
    type: 'post',
    data: formData ,
    dataType: 'json',
    success: function(response) {
        $("button[type=submit]").prop('disabled',false)

        if(response['status'] == true){

            window.location.href= "<?php echo e(route('governorate.index')); ?>";



            $("#name").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
            
        }else{
            var errors = response['errors'];

            if(errors['name']){
                $("#name").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['name']);
            }else{
                $("#name").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }
            
        }

    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error("Error creating category:", textStatus, errorThrown);

    }
  });
});
 
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/admin/governorate/create.blade.php ENDPATH**/ ?>