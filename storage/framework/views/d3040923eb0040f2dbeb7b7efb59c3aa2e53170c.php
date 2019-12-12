<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ثبت تکلیف کلاسی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">فعالیت کلاسی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت تکلیف </a>
                    </li>

                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

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
            <div class="alert text-center alert-success">
                <p> <?php echo e(\Session::get('success')); ?></p>
            </div>
            <?php endif; ?>

            <?php if(\Session::has('Error')): ?>
            <div class="alert text-center alert-danger">
                <p> <?php echo e(\Session::get('Error')); ?></p>
            </div>
            <?php endif; ?>
            <form action="<?php echo e(route('activity_class.SubmitExerciseAdddaily')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class=" form-group col-md-12 ">
                        <label for="" class="  pt-3"> <span class="text-danger">*</span> عنوان تکلیف </label>
                        <input type="text" name="title" class="form-control ">

                    </div>
                </div>
                <div class="row">


                        <div class="form-group col-md-5">
                                <label for="">نام درس: </label>
        
                                <select class="custom-select" name="lesson" id="lesson">
                                    <option value="">باز کردن فهرست انتخاب</option>
        
                                    <?php $__currentLoopData = array_unique(auth()->guard('teacher')->user()->teacher_lessons()->pluck('lesson_name','lesson_id')->toArray()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    );
        
                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
        
                            <div class="form-group col-md-5">
                                <label for="">نام کلاس: </label>
        
                                <select class="custom-select" name="class" id="class">
                                    <option value="">باز کردن فهرست انتخاب</option>
                                    <?php $__currentLoopData = array_unique(auth()->guard('teacher')->user()->teacher_lessons()->pluck('class_name','class_id')->toArray()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                </div>
                <div class="row">
                    <div class="col-md-4  mb-5">

                        <label for=""> تاریخ تحویل تکلیف</label>
                        <input dir="rtl" type="text" value="" name="date"
                            class="form-control  date-picker-shamsi-list" dir="ltr" autocomplete="off">
                    </div>
                </div>
                <button class="btn btn-primary">
                    ثبت تکلیف
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->

<script>
    $(document).ready(function (e) {

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#basic").change(function (e) {

                e.preventDefault();

                var basic_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '../Studing/getStudyClasses',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])

                        }
                    }

                });

            });


            $("#basic").change(function (e) {

                e.preventDefault();

                var basic_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: 'getlessens',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#lesson').html(data)

                        }
                    }

                });

            });

            $("#class").change(function (e) {

                e.preventDefault();

                var class_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '<?php echo e(route("ActivityClass.getStudents")); ?>',
                    data: {class_id: class_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#content-student').html(data)

                        }else{
                            $('#content-student').html("<td>دانش اموزی برای این کلاس وجود ندارد</td>")
                        }
                    }

                });

            });

        })


</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<!-- begin::datepicker -->
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->
<style>
    #ui-datepicker-div {
        z-index: 3000 !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Teachers.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Teachers/Pannel/AddExerciseDaily.blade.php ENDPATH**/ ?>