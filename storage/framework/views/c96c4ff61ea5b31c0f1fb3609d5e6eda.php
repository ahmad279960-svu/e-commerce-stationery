<footer class="section-p1">
    <div class="col">
        <h4>Contact</h4>
        

        <div class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

 
    <div class="col">
        <h4 style="color: #fff;">My Account</h4>
        <?php if(auth()->check()): ?>
            <a href="<?php echo e(route('account.orders')); ?>">Profile</a>
            <a href="<?php echo e(route('account.logout')); ?>">Logout</a>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">Login</a>
            <a href="<?php echo e(route('register')); ?>">Register</a>
        <?php endif; ?>
    </div>






    <div class="col install">
        <h4 style="color: #fff;">Install App</h4>
        <p style="color: #fff;">Form Store or Google Play</p>
        <div class="row">
            <img src="<?php echo e(asset('assets/img/pay/app.jpg')); ?>" alt="">
            <img src="<?php echo e(asset('assets/img/pay/play.jpg')); ?>" alt="">
        </div>
        <p style="color: #fff;">Secured Payment Gatways</p>
        <img src="<?php echo e(asset('assets/img/pay/pay.png')); ?>" alt="">
    </div> 
</footer>


<div class="copyright">
    <p>2025  etc -HTML CSS Ecommerce </p>
</div>

<?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/user/layouts/footer.blade.php ENDPATH**/ ?>