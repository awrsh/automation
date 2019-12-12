;

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">


        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3> نمرات کلاسی </h3>
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
                            <th scope="col">گروه آزمون</th>
                        </tr>
                        </thead>
                        <?php
                            $i=1;
                                $list = \App\ClassScoresModel::where('student_id',$student->student_id)->get();
                        ?>
                        <tbody>
                        <?php if(count($list)): ?>
                            
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i); ?></td>
                                <?php
                                        $lesson = \App\LessonModel::where('id',$item->lesson_id)->first()['lesson_name'];
                                ?>
                                <td><?php echo e($lesson); ?></td>
                                <td><?php echo e($item->score); ?></td>
                                <td><?php echo e($item->class_scores_date); ?></td>
                            </tr>
                            <?php
                                $i++;
                            ?>
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
        $(document).ready(function (e) {

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $("#form").submit(function (e) {
                e.preventDefault();
                $('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')
                var basic = $(this).find('#basic').val();
                var start_date = $(this).find('#case_start_date').val();
                var end_date = $(this).find('#case_end_date').val();

// console.log({basic,start_date,end_date})
                $.ajax({

                    type: 'POST',
                    url: 'getStudyingReportList',
                    data: {
                        basic: basic,
                        start_date: start_date,
                        end_date: end_date
                    },
                    success: function (data) {

                        $('#content').html(data)
                        $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')


                    }

                });

            });

        });


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

<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/ActivityClass/Studying_reportList.blade.php ENDPATH**/ ?>