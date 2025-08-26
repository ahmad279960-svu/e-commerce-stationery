

<?php if(Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Error!</h4>
        <p><?php echo e(Session::get('error')); ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>




<?php if(Session::has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Seccess!</h4>
        <p><?php echo e(Session::get('success')); ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/admin/message.blade.php ENDPATH**/ ?>