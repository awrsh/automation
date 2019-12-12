;

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3> نمرات تکالیف </h3>
            </div>
        </div>
        <div class="card">
            <div class=" card-header">
            </div>
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
                <div class="profile row">
                    <div class="col-sm-6 p-3 mb-5">
                        <div class="d-flex">
                            <div class=" col-sm-6 col-md-3">
                                <?php if($student->student_student_photo ): ?>
                                    <img
                                        src=" <?php echo e(route('BaseUrl')); ?>/uploads/students/<?php echo e($student->student_student_photo); ?>"
                                        style="width: 100px;" class="img-thumbnail" alt="">
                                <?php else: ?>
                                    <img src="<?php echo e(route('BaseUrl')); ?>/Pannel/img/avatar.jpg" style="width: 100px;"
                                         class="img-thumbnail" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9 mt-3">
                                <p class=" lead"><?php echo e($student->student_firstname .' _ '. $student->student_lastname); ?></p>
                                <p class="">کلاس <?php echo e($student->getClass->class_name); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" thead-light">
                        <tr>

                            <th scope="col">ردیف</th>
                            <th scope="col">نام درس</th>
                            <th scope="col">نمره ثبت شده</th>
                            <th scope="col">تاریخ تکلیف</th>
                        </tr>
                        </thead>
                        <tbody>

                         <?php if(count($student->exercise_scores)): ?>
                         <?php $__currentLoopData = $student->exercise_scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$exercise_scores): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>

                           <td ><?php echo e($key +1); ?></td>
                           <td ><?php echo e(\App\LessonModel::where('id',$exercise_scores->lesson_id)->first()->lesson_name); ?></td>
                           <td><?php echo e($exercise_scores->score); ?></td>
                           <td ><?php echo e(\Morilog\Jalali\Jalalian::forge($exercise_scores->exercise_date)->format('%A, %d %B %y')); ?></td>
                         </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php else: ?>
                         <td >موردی برای این دانش اموز وجود ندارد</td>
                         <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="content">

                </div>
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

<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/ActivityClass/Studying_exercisetList.blade.php ENDPATH**/ ?>