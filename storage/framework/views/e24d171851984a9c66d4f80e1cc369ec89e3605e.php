<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> پنل کاری </title>
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/bundle.css" type="text/css"> 
    <?php echo $__env->yieldContent('css'); ?>
    <!-- begin::custom styles -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/css/custom.css" type="text/css">
    <!-- end::custom styles -->

	<!-- begin::favicon -->
	<link rel="shortcut icon" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/media/image/favicon.png">
	<!-- end::favicon -->

	<!-- begin::theme color -->
	<meta name="theme-color" content="#3f51b5" />
	<!-- end::theme color -->

</head>
<body>

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>در حال بارگذاری ...</span>
</div>
<!-- end::page loader -->

<!-- Setting Pannel SideBar -->

<!-- End Setting Pannel SideBar -->

<!-- Pannel SideBar -->
<?php echo $__env->make('Layouts.Pannel.SideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Pannel SideBar -->

<!-- Pannel NavBar -->
<?php echo $__env->make('Layouts.Pannel.NavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Pannel NavBar -->

<!-- Main -->
<main class=" main-content">
 <?php echo $__env->yieldContent('content'); ?>
</main>
<!-- End Main -->


<!-- begin::global scripts -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/bundle.js"></script>

<?php echo $__env->yieldContent('js'); ?>

<!-- begin::custom scripts -->

<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/app.js"></script>
<!-- end::custom scripts -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/sweet-alert.js"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\automation\resources\views/Layouts/Pannel/Template.blade.php ENDPATH**/ ?>