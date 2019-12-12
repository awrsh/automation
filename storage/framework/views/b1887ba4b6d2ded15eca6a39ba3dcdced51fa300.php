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
            <?php if(\Session::has('Error')): ?>
            <div class="alert alert-danger text-center">
                <p><?php echo e(\Session::get('Error')); ?></p>
            </div><br />
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="justify-content: space-between;">
                            <h5 class="card-title"><?php echo e($student->student_firstname); ?> - <?php echo e($student->student_lastname); ?></h5>
                            <div class=" col-md-2 my-2 text-center">
                                    <div class="flex__column">
                                        <?php
                                            if($student->student_student_photo!=""){
                                            $img = route('BaseUrl').'/uploads/students/'.$student->student_national_number.'/'.$student->student_student_photo;
                                            }else{
                                             $img = route('BaseUrl').'/Pannel/img/avatar.jpg';
                                            }
                                        ?>
                                    <img style="object-fit: scale-down;" src="<?php echo e($img); ?>" height="100" width="75" alt="">
                                    </div>
                            </div>
                    </div>
              
                <form id="form1" method="post" action="<?php echo e(route('Student.SendSMS')); ?>"
                        enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div id="wizard2">
                            <?php echo csrf_field(); ?>
                        <input type="hidden" name="id_student" value="">
                          
                           

                        <div class="row">
                                <div class="form-group col-md-6 wd-xs-300">
                                    <label> شماره موبایل: </label>
                                    <input type="text" name="title" value="" class="form-control" required>

                                </div><!-- form-group -->
                                
                            </div>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> عنوان پیام</label>
                                        <input type="text" name="title" value="" class="form-control" required>

                                    </div><!-- form-group -->
                                    
                                </div>
                                <div class=" row">

                                    <div class="form-group col-md-6 wd-xs-300">
                                            <label> متن پیام</label>
                                            <textarea name="content" id="content" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" form-group col-md-6">
                                        <button type="submit" class="btn subForm btn-primary">ارسال</button>
                                    </div>
                                </div>
                           

                        </div>
                </div>
                </form>
            </div>
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

          

    
          });


      $("#number").change(function () {
        var VAL = this.value;
        var rgx = /(\+98|0)?9\d{9}/;
        var mobile = new RegExp(rgx);

        if (mobile.test(VAL)) {
            $("#massage-mother_mobile").html('');
                $('.subForm').attr("disabled", false);
        }else{
            $("#massage-mother_mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
        }
    });


    
    $('#number').on('change',function(e){
            if($(this).val().length>11 || $(this).val().length <11)
            {
                $("#massage-student_mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
                 
            }else{
                $("#massage-student_mobile").html('');
                $('.subForm').attr("disabled", false);
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
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/students/SMSView.blade.php ENDPATH**/ ?>