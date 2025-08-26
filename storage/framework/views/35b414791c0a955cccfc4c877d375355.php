 

<?php $__env->startSection('content'); ?>

    
    <!-- Hero -->
    <section id="hero">
        <h4>Teade-in-offer</h4>
        <h2>Super Value deals</h2>
        <h1>On all products</h1>
        <p>Save move with coupons & up to 70% off!</p>
        <button>Shop Now</button>
    </section>


    <!-- Feature -->
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="<?php echo e(asset('assets/img/features/f1.png')); ?>" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="<?php echo e(asset('assets/img/features/f2.png')); ?>" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="<?php echo e(asset('assets/img/features/f3.png')); ?>" alt="">
            <h6>Save Morey</h6>
        </div>
        <div class="fe-box">
            <img src="<?php echo e(asset('assets/img/features/f4.png')); ?>" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="<?php echo e(asset('assets/img/features/f5.png')); ?>" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="<?php echo e(asset('assets/img/features/f6.png')); ?>" alt="">
            <h6>F24/7 Support</h6>
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
                                    <img src="<?php echo e(asset(path: 'assets/img/default-150x150.png')); ?>" alt="">
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

 

    <!-- New Arrivals -->
    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>summer Collection New Morden Design</p>
        <div class="pro-container">

            <?php if($latesProducts->isNotEmpty()): ?>
                <?php $__currentLoopData = $latesProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                            <h5><?php echo e($product->title); ?></h5>
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


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>

    <script>
        

        






    </script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/user/home.blade.php ENDPATH**/ ?>