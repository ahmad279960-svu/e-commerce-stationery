<?php $__env->startSection('link'); ?>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" />
   <link href="<?php echo e(asset('assets/css/cartStyle.css')); ?>" rel="stylesheet">


<?php $__env->stopSection(); ?>
    

<?php $__env->startSection('content'); ?>




<section>
    <div class="container">

      

       <div class="cart">


         <center>
            <?php if(Session::has('success')): ?>
                  <div class="col-md-8 " style="">
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo Session::get('success'); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                  </div>
            <?php endif; ?>



            <?php if(Session::has('error')): ?>
                  <div class="col-md-8 ">
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(Session::get('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                  </div>
            <?php endif; ?>
         </center>





         <div class="col-md-12 col-lg-10 mx-auto">


            <?php if(Cart::count() > 0): ?>

            <?php $__currentLoopData = $cartContant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="cart-item">
                     <div class="row">
                        <div class="col-md-7 center-item">
                           <?php if(!empty($item->options->productImage->image)): ?>
                              <img src="<?php echo e(asset('uploads/product/'.$item->options->productImage->image)); ?>"  >
                              <?php else: ?>   
                              <img src="<?php echo e(asset('assets/img/default-150x150.png')); ?>" alt="">
                              <?php endif; ?>
                           
                           <a href="<?php echo e(route('user.shop',$item->name)); ?>" style="text-decoration: none; color: #000"><h5><?php echo e($item->name); ?></h5></a>
                        </div>

                        <div class="col-md-5 center-item">
                           <div class="input-group number-spinner">

                              <div class="p-1">
                                 <button id="phone-minus" class="btn btn-default sub" data-id="<?php echo e($item->rowId); ?>"><i class="fas fa-minus"></i></button>
                              </div>

                               <input type="text" readonly class="form-control text-center" value="<?php echo e($item->qty); ?>">

                              <div class="p-1">
                                 <button id="phone-plus" class="btn btn-default add" data-id="<?php echo e($item->rowId); ?>"><i class="fas fa-plus"></i></button>
                              </div>

                           </div>
                           <h5>$ <span id="phone-total"><?php echo e($item->price); ?></span> </h5>

                              <img onclick="deleteItem('<?php echo e($item->rowId); ?>');" src="<?php echo e(asset('assets/img/remove.png')); ?>" alt="" class="remove-item" style="cursor: pointer">

                        </div>
                     </div>
                  </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







               <div class="cart-item">
                  <div class="row g-2">

                     <div class="col-6">
                        <?php $__currentLoopData = $cartContant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <h5><?php echo e($item->name); ?>: x<?php echo e($item->qty); ?></h5>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <h5>Total:</h5>
                     </div>

                     <div class="col-6 status">
                        <?php $__currentLoopData = $cartContant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <h5>$<?php echo e(number_format($item->price * $item->qty,2)); ?></h5>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <h5>$<span id="sub-total"><?php echo e(Cart::subtotal()); ?></span></h5>
                     </div>
                     
                  </div>
               </div>
               <div class="col-md-12 pt-4 pb-4">   
                     <a href="<?php echo e(route('user.checkout')); ?>" class="btn btn-success check-out">
                        Check Out
                     </a>
               </div>
            </div>
         </div>


         <?php else: ?>

         <div class="col-md-12">
            <div class="card" style="background: #E3E6F3">
                  <div class="card-body d-flex justify-content-center align-items-center">
                     <h4>Your Cart is empty!</h4>
                  </div>
            </div>
         </div>

      <?php endif; ?>

    </div>

 </section>
 
 <?php $__env->stopSection(); ?>
 
 
 
 
 
<?php $__env->startSection('customJs'); ?>
    <script src="<?php echo e(asset('assets/js/cart.js')); ?>"></script>
    <script>


      function deleteItem(rowId){
         if(confirm("Are you sure you want to delete?")){
               $.ajax({
                  url: '<?php echo e(route("front.deleteItem.cart")); ?>',
                  type: 'post',
                  data: {rowId:rowId},
                  dataType: 'json',
                  success: function(response) {
                           // console.log('hi');
                           window.location.href = "<?php echo e(route('front.cart')); ?>";
                  }
               });
         }
      }


      
      // +1
      function updateCart(rowId,qty){
         $.ajax({
               url: '<?php echo e(route("front.updateCart")); ?>',
               type: 'post',
               data: {rowId:rowId , qty:qty},
               dataType: 'json',
               success: function(response) {
                     // console.log('hi');
                  window.location.href = "<?php echo e(route('front.cart')); ?>";

               }
         });
      }
      // +1
      $('.add').click(function(){
         var qtyElement = $(this).parent().prev(); // Qty Input
         var qtyValue = parseInt(qtyElement.val());
         qtyElement.val(qtyValue+1);
         

         var rowId = $(this).data('id');
         var newQty =  qtyElement.val();

         // console.log(qtyValue); 

         updateCart(rowId,newQty)
      });


      // -1
      $('.sub').click(function(){
         var qtyElement = $(this).parent().next(); 
         var qtyValue = parseInt(qtyElement.val());
         if (qtyValue > 1) {
               qtyElement.val(qtyValue-1);

               var rowId = $(this).data('id');
               var newQty =  qtyElement.val();

               updateCart(rowId,newQty)
         }        
      });




    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/user/cart.blade.php ENDPATH**/ ?>