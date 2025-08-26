<?php if(Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h5><i class="icon fas fa-ban"></i> Error!</h5>   <?php echo e(Session::get('error')); ?>

    </div>
<?php endif; ?>




<?php if(Session::has('success')): ?>
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <h5 class="no-hover"><i class="icon fas fa-check"></i> Seccess!</h5> <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>

<?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/account/common/message.blade.php ENDPATH**/ ?>