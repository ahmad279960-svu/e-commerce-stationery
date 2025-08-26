<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Page Create Product</h5>

        <!-- No Labels Form -->
        <form class="row g-3" method="POST" name="productForn" id="productForn">

            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="title" name="title" id="title">
                <p></p>
            </div>
            <div class="col-md-6">
                <input readonly type="text" name="slug" id="slug" class="form-control" placeholder="slug">
                <p></p>
            </div>
            
            

            <div class="col-md-6">
                <input type="number" name="price" id="price" class="form-control" placeholder="price">
                <p></p>
            </div>
            



            <div class="col-md-6">
                <input  type="number" name="qty" id="qty" class="form-control" placeholder="qty">
                <p></p>
            </div>
            



            
            <div class="col-md-4">
                <select name="category" id="category" class="form-select">
                    <option hidden value="">Select Category</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <p></p>
            </div>


            <div class="col-md-4">
                <select name="is_featured" id="is_featured" class="form-select">
                    <option hidden value="">Featured</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <p></p>
            </div>


            <div class="col-md-4">

                <select name="status" id="status" class="form-select">
                    <option hidden value="">status</option>
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                </select>
                <p></p>
            </div>





            <div class="col-md-6">
                <textarea name="description" id="description" cols="30" placeholder="description" rows="5" class="form-control"></textarea>
                <p></p>
            </div>



            <div class=" col-md-6">
                <div class="card-body">
                    <div id="image" class="dropzone dz-clickable">
                        <div class="dz-message needsclick">
                            <br>Drop files here or click to upload.<br><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="product-gallery">

            </div>

            <div class="">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="<?php echo e(route('product.index')); ?>" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>




        </form>
        
        <!-- End No Labels Form -->

    </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script> 


    <script>
        
$("#productForn").submit(function(event) {
  event.preventDefault();

  var element = $(this);
  var formData = element.serialize();


  $("button[type=submit]").prop('disabled',true)
  $.ajax({
    url: '<?php echo e(route("product.store")); ?>',
    type: 'post',
    data: formData ,
    dataType: 'json',
    success: function(response) {
        $("button[type=submit]").prop('disabled',false)

        if(response['status'] == true){

            window.location.href= "<?php echo e(route('product.index')); ?>";

            $("#title").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');

            $("#slug").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
 
            $("#price").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
            
            $("#qty").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
 
            $("#category").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
            
            $("#is_featured").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
            
            $("#status").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
 
            $("#description").removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback').html('');
            

        }else{
            var errors = response['errors'];

            if(errors['title']){
                $("#title").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['title']);
            }else{
                $("#title").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }

            if(errors['slug']){
                $("#slug").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['slug']);
            }else{
                $("#slug").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }
 
            if(errors['price']){
                $("#price").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['price']);
            }else{
                $("#price").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }

            if(errors['qty']){
                $("#qty").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['qty']);
            }else{
                $("#qty").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }

            if(errors['category']){
                $("#category").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['category']);
            }else{
                $("#category").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }

            if(errors['is_featured']){
                $("#is_featured").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['is_featured']);
            }else{
                $("#is_featured").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }

            if(errors['status']){
                $("#status").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['status']);
            }else{
                $("#status").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback').html('');
            }
            
            if(errors['description']){
                $("#description").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback').html(errors['description']);
            }else{
                $("#description").removeClass('is-invalid')
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

        






        $("#title").change(function(){
        element = $(this);
        
        $("button[type=submit]").prop('disabled',true)
            $.ajax({
                url: '<?php echo e(route("getSlug")); ?>',
                type: 'get',
                data: { name : element.val() } ,
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled',false)
            
                    if(response["status"] == true){
                        $("#slug").val(response["slug"]);
                    }
            
            
                }
            });
        });


        // Dropzone
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            url:  "<?php echo e(route('temp-images.create')); ?>",
            maxFiles: 10,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, success: function(file, response){

                console.log(response);
                
                // $("#image_id").val(response.image_id);
                //console.log(response)


                var html =`
                <div class="col-md-3" id="image-row-${response.image_id}">
                    <div class="card">
                        <input type="hidden" name="image_array[]" value="${response.image_id}">
                        <img src="${response.ImagePaht}" class="card-img-top" alt="">

                        <div class="card-body">
                            <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                <div>`;


                $('#product-gallery').append(html);
            },
            complete :function(file){
                this.removeFile(file);
            }

        });

    function deleteImage(id) {
        $.ajax({
            url: "<?php echo e(route('temp-images.destroy')); ?>",
            type: 'delete',
            data: { id:id },
            success: function(response){
                if(response.status == true){
                    alert(response.message);
                }else{
                    alert(response.message);
                }

            }
        });
        
        $("#image-row-"+id).remove();
    }

        
    </script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/admin/Product/create.blade.php ENDPATH**/ ?>