<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class=" col-md-12">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>


            <?php endif; ?>

            <?php if(\Session::has('success')): ?>
            <div class="alert alert-success text-center">
                <p><?php echo e(\Session::get('success')); ?></p>
            </div><br />
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> ثبت نام </h5>
                    <form id="form1" method="post" action=" <?php echo e(route('Admin.RegisterSchool')); ?> "
                        enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div id="wizard2">
                            <?php echo csrf_field(); ?>

                            <section>

                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> نام مدرسه</label>
                                        <input type="text" class="form-control" name="nameSchool" required>

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> مقطع </label>

                                        <select id="student_section" required name="school_section"
                                            class="custom-select mb-3">

                                            <?php $__currentLoopData = \App\Models\SectionModel::all();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=" <?php echo e($item->sections_id); ?> "><?php echo e($item->sections_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <option value="AllM"> دوره اول و دوم متوسطه</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام مدیر مدرسه</label>
                                        <input type="text" class="form-control" name="nameManager" required>

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>شماره موبایل مدیر مدرسه</label>
                                        <input type="number" class="form-control" id="mobile" name="mobile_manager"
                                            required>
                                        <p class="errorMassage" id="massage-mobile"></p>
                                    </div><!-- form-group -->

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام کاربری</label>
                                        <input type="text" class="form-control" name="username" required>

                                    </div><!-- form-group -->

                                    <?php
                                    $alphabet =
                                    'abcdefghijklmnopqrstuvwxyz#@!*&^%$[]_-+=ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                    $pass = array(); //remember to declare $pass as an array
                                    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                                    for ($i = 0; $i < 10; $i++) { $n=rand(0, $alphaLength); $pass[]=$alphabet[$n]; }
                                        $pw=implode($pass); ?> <div class="form-group col-md-6 wd-xs-300">
                                        <label>کلمه عبور</label>
                                        <input type="text" class="form-control" name="password" value="<?php echo e($pw); ?>"
                                            required>

                                </div><!-- form-group -->

                        </div>
                        <div class="row">
                                <div class="form-group col-md-6 wd-xs-300">
                                        <label>دامنه</label>
                                        <input type="text" name="url" placeholder="https://example.exm.co" required class="form-control text-left">
        
                                    </div><!-- form-group -->
        
                            <div class="form-group col-md-6 wd-xs-300">
                                <label>تعداد دانش آموزان</label>
                                <input type="number" name="count_students" required class="form-control text-right">

                            </div><!-- form-group -->

                            <div class="form-group col-md-6 wd-xs-300">
                                <label> آدرس مدرسه</label>
                                <textarea name="address_school" id="" required class="form-control text-right"
                                    rows="3"></textarea>
                            </div><!-- form-group -->

                        </div>

                        </section>
                        <section>
                            <div class="row">
                                <div class=" form-group col-md-6">
                                    <button type="submit" class="btn subForm btn-primary">ارسال</button>
                                </div>
                            </div>
                        </section>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>

<!-- begin::form wizard -->
<link rel="stylesheet" href=" <?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/form-wizard/jquery.steps.css" type="text/css">
<style>
    input.error {
        background: rgb(255, 255, 255) !important;
        border: 1px solid #ff5368 !important;
        color: #ed1636 !important;
    }

    .border-top {
        border-top: 1px solid #e5e5e5;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e5e5;
    }

    .border-top-gray {
        border-top-color: #adb5bd;
    }

    .box-shadow {
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
    }

    .lh-condensed {
        line-height: 1.25;
    }

    .errorMassage {
        color: #ed1636;
    }
</style>
<!-- end::form wizard -->

<!-- begin::datepicker -->
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- begin::form wizard -->


<script>
    (function () {
            'use strict';
            window.addEventListener('load', function () {
                
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');

                    }, false);
                });
            }, false);

          $('#mobile').on('change',function(e){
            if($(this).val().length>11 || $(this).val().length <11)
            {
                $("#massage-mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
                 
            }else{
                $("#massage-mobile").html('');
                $('.subForm').attr("disabled", false);
            }
          });


          $("#mobile").change(function () {
        var VAL = this.value;
        var rgx = /(\+98|0)?9\d{9}/;
        var mobile = new RegExp(rgx);
        
        if (mobile.test(VAL)) {
            $("#massage-mobile").html('');
                $('.subForm').attr("disabled", false);
        }
        else{
            $("#massage-mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
        }
    });
    



        })();
      




</script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/toast.js"></script>
<!-- end::form wizard -->



<!-- begin::datepicker -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Admin.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Admin/AddSchool.blade.php ENDPATH**/ ?>