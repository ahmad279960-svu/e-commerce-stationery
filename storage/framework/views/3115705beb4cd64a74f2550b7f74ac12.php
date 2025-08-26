<?php $__env->startSection('content'); ?>


<section class="section-p1" id="prodetails">
    <div class="single-pro-image">


        <?php
            $proImageAll = $product->product_images->all();
            $proImage = $proImageAll[0];
        ?>
                    

        <img src="<?php echo e(asset('uploads/product/'.$proImage->image)); ?>" width="100%" id="MainImg" alt="">

        <div class="small-img-group">

            <?php if(!empty($proImageAll[1])): ?>
                <?php $__currentLoopData = $proImageAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="small-img-col">
                        <img src="<?php echo e(asset('uploads/product/'.$img->image)); ?>" width="100%" class="small-img" alt="">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>


    <div class="single-pro-details">
        <h6><a href="<?php echo e(route('user.home')); ?>" style="text-decoration: none;color:#000;cursor: pointer;">Home</a> / Shop</h6>
        <h4><?php echo e($product->title); ?></h4>

        <h2>$<?php echo e(number_format($product->price,2)); ?></h2>

        


        <a href="javascript:void(0);" onclick="addToCart(<?php echo e($product->id); ?>);">
            <button class="normal">Add To Cart</button>
        </a>

        <h4>Product Details</h4>
        <span><?php echo e($product->description); ?></span>
    </div>
</section>




    <!-- Featured Products -->
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>summer Collection New Morden Design</p>
        <div class="pro-container">

            <?php if($featuredProducts->isNotEmpty()): ?>
                <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
  


        </div>
    </section>




<?php $__env->stopSection(); ?>




<?php $__env->startSection('customJs'); ?>
    <script>

        var MainImg = document.getElementById('MainImg');
        var smallimg = document.getElementsByClassName('small-img');


        smallimg[0].onclick = function(){
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function(){
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            MainImg.src = smallimg[3].src;
        }
        smallimg[4].onclick = function(){
            MainImg.src = smallimg[4].src;
        }

    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/user/shop.blade.php ENDPATH**/ ?>