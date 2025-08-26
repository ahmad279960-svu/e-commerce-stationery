 
<!-- navbar -->
<section id="header">

    <a></a>

    <div>
        <ul id="navbar">
            <li><a class="<?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(route('user.home')); ?>">Home</a></li>
            <li><a class="<?php echo e(request()->is('shop*') ? 'active' : ''); ?>" href="#">Shop</a></li>

            
            <li><a class="<?php echo e(request()->is('categorie*') ? 'active' : ''); ?>" href="<?php echo e(route('user.categorie')); ?>">Categories</a></li>

            
 

            <?php if(auth()->check()): ?>

            
                <?php if(auth()->user()->role === 'admin'): ?>
                    <li><a class="<?php echo e(request()->is('orders') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashbord')); ?>" >Dashbord</a></li>
                    <?php else: ?>
                    <li><a class="<?php echo e(request()->is('orders') ? 'active' : ''); ?>" href="<?php echo e(route('account.orders')); ?>" >profile</a></li>
                <?php endif; ?>
                


            <?php else: ?>
                <li><a href="<?php echo e(route('login')); ?>">login</a></li>
            <?php endif; ?>
            


            
                <li id="lg-bag">
                    <a class="<?php echo e(request()->is('cart') ? 'active' : ''); ?>" href="<?php echo e(route('front.cart')); ?>">
                        <i class="fa-solid fa-cart-shopping"></i>   
                    </a>
                </li>
            


            <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>

        </ul>
    </div>
    <div id="mobile">
        <a href="<?php echo e(route('front.cart')); ?>"><i class="fa-solid fa-cart-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>


<script>
    let profileDropdownList = document.querySelector(".profile-dropdown-list");
    let btn = document.querySelector(".profile-dropdown-btn");

    let classList = profileDropdownList.classList;

    const toggle = () => classList.toggle("active");

    window.addEventListener("click", function (e) {
    if (!btn.contains(e.target)) classList.remove("active");
    });

</script>


<?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/user/layouts/nav.blade.php ENDPATH**/ ?>