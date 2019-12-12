<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ثبت نمره تکلیف</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">فعالیت کلاسی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت نمره تکلیف </a>
                    </li>

                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
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
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <form action="<?php echo e(route('activity_class.ScoreExercise')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <input type="hidden" id="dateEX" name="date_ex">


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

                    <div class="col-md-4  mb-3">

                        <label for=""> تکلیف</label>
                        <select id="Exercise" name="Exercise" class=" custom-select  mb-3">

                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h5> <span id="dateEXTXT"></span></h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered  ">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>نام پدر</th>
                                    <th>نمره</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="content-student">
                            </tbody>
                        </table>

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

         

         
     $("#class").change(function (e) {

        e.preventDefault();

        var class_id = $(this).val();

        $.ajax({

            type: 'POST',
            url: '<?php echo e(route("Teachers.WorkSpace.getStudents")); ?>',
            data: {class_id: class_id,},
            success: function (data) {
                console.log(data.length)
                if (data.length !== 0) {

                    $('#content-student').html(data)

                }else{
                    $('#content-student').html("<tr><td>دانش اموزی برای این کلاس وجود ندارد</td></tr>")
                }
            }

        });

});

            $("#class").change(function (e) {

                e.preventDefault();

                var class_id = $(this).val();
                var lesson_id = $('#lesson').val();
                $.ajax({

                    type: 'POST',
                    url: '<?php echo e(route("ActivityClass.getExercise")); ?>',
                    data: {class_id: class_id,lesson_id:lesson_id},
                    success: function (data) {
                        console.log(data)
                        if (data !== '') {
                            $('#dateEX').val(data[1]);
                            $('#dateEXTXT').html('تاریخ  تکلیف : '  + data[1]);
                            $('#Exercise').html(data[0])

                        }
                    }

                });

            });
            $("#Exercise").change(function (e) {

                e.preventDefault();

                var Exercise_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '<?php echo e(route("ActivityClass.getExerciseDate")); ?>',
                    data: {exercise_id: Exercise_id,},
                    success: function (data) {
                        if (data !== '') {
                            $('#dateEX').val(data);
                            $('#dateEXTXT').html('تاریخ  تکلیف : '  + data );

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
<?php echo $__env->make('Layouts.Teachers.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Teachers/Pannel/ExerciseScoreView.blade.php ENDPATH**/ ?>