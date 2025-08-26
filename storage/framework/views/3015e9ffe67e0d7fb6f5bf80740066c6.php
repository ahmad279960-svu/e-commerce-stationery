






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
            <div class="col-md-12">
                <?php echo $__env->make('account.common.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-md-3">
                <?php echo $__env->make('account.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <div class="card" style="background: #eee9e9">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
                    </div>

                    <form action="" name="profileForm" id="profileForm">
                        <div class="card-body p-4">
                            <div class="row">
                                 
                                <div class="col-md-6 mb-3">               
                                    <label for="name">The Name</label>
                                    <input value="<?php echo e((!empty($user->name)) ? $user->name : ''); ?>" type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                                    <p></p>
                                </div>

 

                                <div class="col-md-6 mb-3">            
                                    <label for="phone">Phone</label>
                                    <input value="<?php echo e((!empty($user->phone)) ? $user->phone : ''); ?>" type="text" name="phone" id="phone" placeholder="Enter Your Phonel" class="form-control">
                                    <p></p>
                                </div>
                                 


                                <div class="mb-3">                                    
                                    <label for="phone">Address</label>
                                    <textarea  cols="30" rows="5" name="address" id="address" class="form-control"><?php echo e((!empty($user->address)) ? $user->address : ''); ?></textarea>
                                    <p></p>
                                </div>


                                <div class="d-flex">
                                    <button type="submit" class="btn btn-dark">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

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



$("#profileForm").submit(function(event){
            event.preventDefault();

        
            $.ajax({
                url: '<?php echo e(route("account.updateProfile")); ?>',
                type: 'post',
                data: $(this).serializeArray() ,
                dataType: 'json',
                success: function(response) {     
                    // console.log('hii');
                    if(response['status'] == true){

                        $("#profileForm #name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html('');
                        
                        $("#profileForm #address").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html('');
                        
                        
                        $("#profileForm #phone").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html('');
                        
                        window.location.href= "<?php echo e(route('user.profile')); ?>";


                    } else {

                        var errors = response['errors'];

                        if(errors['name']){
                            $("#profileForm #name").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['name']);
                        }else{
                            $("#profileForm #name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html('');
                        }

                        if(errors['address']){
                            $("#profileForm #address").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['address']);
                        }else{
                            $("#address").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html('');
                        }

                        if(errors['phone']){
                            $("#profileForm #phone").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['phone']);
                        }else{
                            $("#phone").removeClass('is-invalid')
                           .siblings('p')
                           .removeClass('invalid-feedback').html('');
                        }

                    }

                }
            })
        });




</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/account/profile.blade.php ENDPATH**/ ?>