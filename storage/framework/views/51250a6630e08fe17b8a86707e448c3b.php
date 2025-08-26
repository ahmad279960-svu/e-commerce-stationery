<?php $__env->startSection('link'); ?>


<style>
    
button,
button:focus {
  font-size: 17px;
  padding: 10px 25px;
  border-radius: 0.7rem;
  border: 2px solid rgb(50, 50, 50);
  border-bottom: 5px solid rgb(50, 50, 50);
  box-shadow: 0px 1px 6px 0px rgb(35, 112, 88);
  transform: translate(0, -3px);
  cursor: pointer;
  transition: 0.2s;
  transition-timing-function: linear;
}

 
</style>


<?php $__env->stopSection(); ?>
 

<?php $__env->startSection('content'); ?>
 
 







 <!-- Featured Products -->
 <section id="product1" class="section-p1">




    <a href="<?php echo e(route('user.categorie')); ?>"><button>All</button></a>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <a href="<?php echo e(route('user.categorie',$categorie->slug)); ?>"><button> <?php echo e($categorie->name); ?></button></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="pro-container">

        <?php if($products->isNotEmpty()): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($product->qty > 0): ?>

                <?php
                    $productImage = $product->product_images->first();
                ?>
                
                    <div class="pro">


                        <a href="<?php echo e(route('user.shop',$product->slug)); ?>" class="product-img">
                            <?php if(!empty($productImage->image)): ?>
                                <img src="<?php echo e(asset('uploads/product/'.$productImage->image)); ?>" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/img/default-150x150.png')); ?>" alt="">
                            <?php endif; ?>
                        </a>
                        

                        <div class="des">
                            <span><?php echo e($product->category->name); ?></span>
                            <a href="#" style="text-decoration: none"><h5><?php echo e($product->title); ?></h5></a>
                           
                            <h4>$<?php echo e($product->price); ?></h4>
                        </div>

                         
                        <div style="position: absolute; right: 10px; bottom: 20px; display: flex; gap: 3px; align-items: center;">
                            <!-- أيقونة Wishlist -->
                            <a href="javascript:void(0);" onclick="addToWishlist(<?php echo e($product->id); ?>);" class="icon-button love">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        
                            <!-- أيقونة السلة -->
                            <a href="javascript:void(0);" onclick="addToCart(<?php echo e($product->id); ?>);" class="icon-button">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                        
                    </div>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

    </div>
</section>


<?php $__env->stopSection(); ?>
 
 
 
 
<?php $__env->startSection('customJs'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/user/categories.blade.php ENDPATH**/ ?>