;

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">


        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3>ثبت اخراج از کلاس</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="#">فعالیت کلاسی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#"> ثبت اخراج از کلاس</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <?php if(\Session::has('error')): ?>
                    <div class="alert alert-danger text-center alert-success">
                        <p>  <?php echo e(\Session::get('error')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if(\Session::has('success')): ?>
                    <div class="alert alert-success text-center ">
                        <p>
                            <?php echo e(\Session::get('success')); ?>

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
                <div class="mb-4">
                    <div class="row ">
                        <div class="col-md-6">
                            <label for=""> انتخاب پایه</label>
                            <select id="basic" name="basic" class="custom-select">
                                <?php $__currentLoopData = \App\Models\BasicModel::where('section_id',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->basic_id); ?>"><?php echo e($item->basic_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <button class="btn btn-primary">انتخاب</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>ثبت مورد اخراج</h4>
                <form action="<?php echo e(route('activity_class.InsertExitClass')); ?> " method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for=""> انتخاب درس</label>
                            <select id="basic" name="lesson" class="custom-select mb-3">
                                <option value="" selected="">باز کردن فهرست درس ها</option>
                                <?php $__currentLoopData = \App\LessonModel::where('basic_id',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->lesson_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">تاریخ</label>
                            <input type="text" name="case_date"
                                   class="form-control text-right date-picker-shamsi-list" dir="ltr"
                                   autocomplete="off">
                        </div>
                    </div>
                    <?php if(count($classes)>0): ?>
                        <ul class=" nav nav-pills my-3" id="pills-tab2" role="tablist">
                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link  <?php echo e($key == 0 ? ' active':''); ?>" id="pills-<?php echo e($item->class_id); ?>-tab"
                                       data-toggle="pill" href="#pills-<?php echo e($item->class_id); ?> " role="tab"
                                       aria-controls="pills-<?php echo e($item->class_id); ?>"
                                       aria-selected=" <?php echo e($key == 0 ? 'true':'false'); ?> "><?php echo e($item->class_name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <div class="tab-content" id="pills-tabContent2">
                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($key == 0 ? 'show active':''); ?>"
                                     id="pills-<?php echo e($item->class_id); ?>"
                                     role="tabpanel" aria-labelledby="pills-<?php echo e($item->class_id); ?>-tab">
                                    <table class="table table-striped table-bordered example2">
                                        <thead>
                                        <tr>
                                            <th>ردیف</th>
                                            <th>نام - نام خانوادگی</th>
                                            <th>شماره دانش آموزی</th>
                                            <th>کلاس</th>
                                            <th>ثبت اخراج از کلاس</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i =1;
                                        ?>
                                        <?php $__currentLoopData = \App\Models\Student::where('student_student_class',$item->class_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td> <?php echo e($key+1); ?> </td>
                                                <td><?php echo e($students->student_firstname .' '.$students->student_lastname); ?></td>
                                                <td><?php echo e($students->student_student_number); ?></td>
                                                <td><?php echo e($students->getClass->class_name); ?></td>
                                                <input type="hidden" name="class_id"
                                                       value="<?php echo e($students->getClass->class_id); ?>">
                                                <td>

                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="<?php echo e($students->student_id); ?>"
                                                                   name="status[]"
                                                                   class="custom-control-input switch"
                                                                   id="asd-<?php echo e($i); ?>">
                                                            <label class="custom-control-label"
                                                                   for="asd-<?php echo e($i); ?>">اخراج</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                $i++;
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title mt-2"> توضیح </h5>

                                            <input   name="case_description" class="form-control text-right ">

                                        </div>
                                    </div>


                                    <h6 class="card-title mt-4 mb-1"> تاثیر در نمره </h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="1" id="customRadioInline1" name="case_effect"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline1"> دارد </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="0" id="customRadioInline2" name="case_effect"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2"> ندارد </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-3">ثبت</button>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                </form>
            </div>

        </div>

    </div>
    <?php else: ?>

        <p>کلاسی برای این پایه وجود ندارد !</p>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
    <script
        src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
    <script
        src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datatable.js"></script>
    <!-- begin::datepicker -->
    <script
        src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
    <script
        src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
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
                    url: 'InsertStatusAbsence',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])

                        }
                    }

                });

            });

        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet"
          href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
          type="text/css">

    <!-- begin::datepicker -->
    <link rel="stylesheet"
          href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/ActivityClass/Dismissal.blade.php ENDPATH**/ ?>