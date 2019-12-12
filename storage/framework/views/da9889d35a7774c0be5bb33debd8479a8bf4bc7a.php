;

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3 style="color: #a4aac1;
            text-shadow: 0 1px 1px black;"> ثبت مطالعات</h3>
                
            </div>


        </div>

        <div class="card">
            <div class="card-body">

                <?php if(\Session::has('success')): ?>
                    <div class="alert alert-success">
                        <p>
                            <?php echo e(\Session::get('success')); ?>

                        </p>
                    </div>
                <?php endif; ?>

                <?php if(\Session::has('Error')): ?>
                    <div class="alert alert-danger">
                        <p>
                            <?php echo e(\Session::get('Error')); ?>

                        </p>
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

                <form action=" <?php echo e(route('Student.WorkSpace.ExerciseDailyInsert')); ?> " method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <div class=" row">
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>

                                        <th>نام درس</th>
                                        <th>عنوان تکلیف</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(\App\ExerciseDaily::where('lesson_id',$lesson->id)->count()): ?>
                                            <?php $__currentLoopData = \App\ExerciseDaily::where('lesson_id',$lesson->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $rand = rand();
                                                ?>
                                                <tr>

                                                    <td> <?php echo e($lesson->lesson_name); ?></td>
                                                    <td>
                                                        <?php echo e($exercise->exercise_name); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($exercise->exercise_date); ?>

                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" value="<?php echo e($exercise->exercise_id); ?>"
                                                                       name="status[]"
                                                                       class="custom-control-input switch"
                                                                       id="<?php echo e($rand); ?>">
                                                                <label class="custom-control-label"
                                                                       for="<?php echo e($rand); ?>"><span class="text-danger">انجام نشده</span></label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12  my-3">

                                <button type="submit" class=" btn btn-primary btn__info"> ثبت اطلاعات</button>
                            </div>
                        </div>

                    </div>
                </form>


            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datatable.js"></script>
    <!-- begin::datepicker -->
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datepicker.js"></script>
    <!-- end::datepicker -->

    <script>
        $(document).ready(function (e) {


            $('.switch').change(function () {
                if ($(this).is(':checked')) {
                    $(this).next().html('<span class="text-success">انجام شده</span>')
                } else {
                    $(this).next().html('<span class="text-danger">انجام نشده</span>')
                }
            })
        })


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
          type="text/css">

    <!-- begin::datepicker -->
    <link rel="stylesheet"
          href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Students.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Students/Pannel/ExerciseDailyView.blade.php ENDPATH**/ ?>