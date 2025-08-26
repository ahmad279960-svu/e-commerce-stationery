<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/quill/quill.snow.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/quill/quill.bubble.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/simple-datatables/style.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
 
  
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo $__env->yieldContent('style'); ?>

</head>

<body>

 <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



 <main id="main" class="main">
     <?php echo $__env->yieldContent('content'); ?>
 </main><!-- End #main -->





 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->


 
 <script src="<?php echo e(asset('assets/vendor/apexcharts/apexcharts.min.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/vendor/chart.js/chart.umd.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/vendor/echarts/echarts.min.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/vendor/quill/quill.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/vendor/simple-datatables/simple-datatables.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/vendor/tinymce/tinymce.min.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/vendor/php-email-form/validate.js')); ?>"></script>

 <!-- Template Main JS File -->
 <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>



 
 <script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>



 <script>

  // api
  $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

</script>


 <?php echo $__env->yieldContent('customJs'); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\e-commerce-stationery\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>