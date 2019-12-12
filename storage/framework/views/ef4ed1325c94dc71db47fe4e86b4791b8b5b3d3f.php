<?php $__env->startSection('content'); ?>
<div class="container h-100-vh">
    <div class="row align-items-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block p-t-b-25">
            <img class="img-fluid" src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/images/login_img.jpg" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1 p-t-b-25">
            <div class="d-flex align-items-center m-b-20">
                
                <h3 class="m-0">ایجاد حساب کاربری</h3>
            </div>
            <p>موارد زیر را تکمیل کنید</p>
            <?php echo $__env->make('FrontEnd.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(\Session::has('success')): ?>
            <div class="alert alert-success text-center">
                <p><?php echo e(\Session::get('success')); ?></p>
            </div><br />
            <?php endif; ?>
            <form action="<?php echo e(route('AddAccount')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-4">
                    <input type="text" required class="form-control form-control-lg" name="schoolname" autofocus
                        placeholder="  نام مدرسه">
                </div>
                <select name="school_section" class="form-control custom-select  mb-3">
                    <?php
                    $sections = \App\Models\SectionModel::get();
                    ?>
                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value=" <?php echo e($item->sections_id); ?> "><?php echo e($item->sections_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="form-group mb-4">
                    <input type="text" required class="form-control form-control-lg" name="fullname" autofocus
                        placeholder="  نام نام خانوادگی">
                </div>
                <div class="form-group mb-4">
                    <input type="text" id="mobile" required class="form-control form-control-lg" name="mobile"
                        placeholder="   تلفن همراه">
                    <p class="errorMassage" id="massage1"></p>
                </div>
                <div class="form-group mb-4">
                    <input type="number" required class="form-control form-control-lg" name="student_count"
                        placeholder=" تعداد دانش آموزان">
                </div>

                <div class="form-group mb-4">
                    <input type="text" required class="form-control form-control-lg" name="username"
                        placeholder="  نام کاربری">
                </div>
                <div class="form-group mb-4">
                    <input type="password" required class="form-control form-control-lg" name="password"
                        placeholder="رمز عبور">
                </div>
                <div class="form-group mb-4">
                    <textarea name="address" id="" required placeholder="آدرس" class="form-control form-control-lg"
                        cols="10"></textarea>
                </div>


                <button class="btn subForm btn-success btn-lg btn-block btn-uppercase mb-2">ثبت نام</button>

            </form>
            <hr>
            <a class="d-block" href="<?php echo e(route('ForgetPassword')); ?>">کلمه عبورتان را فراموش کرده اید ؟</a>
            <a class="d-block my-3 " href="<?php echo e(route('BaseUrl')); ?>">ورود به حساب کاربری</a>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style>
    .errorMassage {
        color: #ed1636;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    (function () {
        'use strict';
          $('#mobile').on('change',function(e){
            
            if($(this).val().length>11 || $(this).val().length <11)
            {
                $("#massage1").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
                 
            }else{
                $("#massage1").html('');
                $('.subForm').attr("disabled", false);
            }
          });


          $("#mobile").change(function () {
        var VAL = this.value;
        var rgx = /(\+98|0)?9\d{9}/;
        var mobile = new RegExp(rgx);

        if (mobile.test(VAL)) {
            $("#massage1").html('');
                $('.subForm').attr("disabled", false);
        }else{
            $("#massage1").html('  شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
        }
    });
})();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.FrontEnd.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/FrontEnd/CreateAccount.blade.php ENDPATH**/ ?>