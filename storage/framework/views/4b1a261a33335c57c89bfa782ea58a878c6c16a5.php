<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قالب مدیریتی Gramos</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/css/app.css" type="text/css">
    <!-- end::custom styles -->

    <!-- begin::favicon -->
    <link rel="shortcut icon" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/media/image/favicon.png">
    <!-- end::favicon -->

    <!-- begin::theme color -->
    <meta name="theme-color" content="#3f51b5" />
    <!-- end::theme color -->

</head>

<body class="bg-white h-100-vh p-t-0">

    <!-- begin::page loader-->
    <div class="page-loader">
        <div class="spinner-border"></div>
        <span>در حال بارگذاری ...</span>
    </div>
    <!-- end::page loader -->

    <div class="container h-100-vh">
        <div class="row align-items-center h-100-vh">
            <div class="col-lg-6 d-none d-lg-block p-t-b-25">
                <img class="img-fluid" src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/images/login_img.jpg" alt="...">
            </div>
            <div class="col-lg-4 offset-lg-1 p-t-b-25">
                <div class="d-flex align-items-center m-b-20">
                    <img src="assets/media/image/dark-logo.png" class="m-l-15" width="40" alt="">
                    <h3 class="m-0">مدیریت المینو</h3>
                </div>
                <p>برای ادامه وارد شوید.</p>
                <?php echo $__env->make('Form.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo e(route('login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-4">
                        <input type="text" class="form-control form-control-lg" name="username" autofocus
                            placeholder="  نام کاربری">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control form-control-lg" name="password"
                            placeholder="رمز عبور">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">به خاطر سپاری</label>
                        </div>

                    </div>
                    <button class="btn btn-primary btn-lg btn-block btn-uppercase mb-4">ورود</button>
                </form>
            </div>
        </div>
    </div>

    <!-- begin::global scripts -->
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/bundle.js"></script>
    <!-- end::global scripts -->

    <!-- begin::custom scripts -->
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/app.js"></script>
    <!-- end::custom scripts -->

</body>

</html><?php /**PATH C:\xampp\htdocs\automation\resources\views/Form/login.blade.php ENDPATH**/ ?>