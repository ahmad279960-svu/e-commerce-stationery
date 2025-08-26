<?php if(!empty(session('success'))): ?>
    <div class="alert alert-success " role="alert">
        <?php echo e(session('success')); ?>

    </div>    
<?php endif; ?>




<?php if(!empty(session('error'))): ?>
    <div class="alert alert-danger " role="alert">
        <?php echo e(session('error')); ?>

    </div>    
<?php endif; ?>


   <?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/message.blade.php ENDPATH**/ ?>