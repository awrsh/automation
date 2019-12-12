;

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">


        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3>ثبت مورد انظباطی</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                        <li class="breadcrumb-item"><a href="#">انظباطی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت مورد انظباطی دانش
                                آموز</a>
                        </li>

                    </ol>
                </nav>
            </div>


        </div>

        <form action=" <?php echo e(route('Discipline.AddCases')); ?> " method="post">

            <?php echo csrf_field(); ?>
            <div class="card">

                <div class="card-body">

                    <?php if(\Session::has('success')): ?>
                        <div class="alert alert-success">
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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">تاریخ</label>
                                <input type="text" name="case_date"
                                       class="form-control text-right date-picker-shamsi-list" dir="ltr"
                                       autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="">عنوان</label>
                                <select name="law_id" class="custom-select custom-select-sm mb-3">
                                    <?php $__currentLoopData = \App\Models\DisciplineLawsModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $low): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=" <?php echo e($low->law_id); ?> "><?php echo e($low->law_title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title mt-2"> توضیح </h5>
                                <textarea type="text" name="case_descriotion" class="form-control text-right "
                                          dir="ltr"></textarea>
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

                        <div class="row">
                            <div class="col-md-12  my-3">
                                <h6><span class="text-danger">*</span> پس از اضافه کردن دانش اموزان از جدول , دکمه تایید
                                    را بزنید </h6>

                                <button type="submit" class=" btn btn-primary">تایید</button>
                            </div>
                        </div>

                    </div>

                    <hr>


                    <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">

                        <?php $__currentLoopData = \App\Models\ClassModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($key == 0 ? ' active':''); ?>" id="pills-<?php echo e($item->class_id); ?>-tab"
                                   data-toggle="pill" href="#pills-<?php echo e($item->class_id); ?> " role="tab"
                                   aria-controls="pills-<?php echo e($item->class_id); ?>"
                                   aria-selected=" <?php echo e($key == 0 ? 'true':'false'); ?> "><?php echo e($item->class_name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>

                    <div class="tab-content" id="pills-tabContent2">
                        <?php $__currentLoopData = \App\Models\ClassModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e($key == 0 ? 'show active':''); ?>" id="pills-<?php echo e($item->class_id); ?>"
                                 role="tabpanel" aria-labelledby="pills-<?php echo e($item->class_id); ?>-tab">


                                <table class="table table-striped table-bordered example2">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام - نام خانوادگی</th>
                                        <th>نام پدر</th>
                                        <th>شماره دانش آموزی</th>
                                        <th>پایه</th>
                                        <th>کلاس</th>
                                        <th>اضافه کردن</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = \App\Models\Student::where('student_student_class',$item->class_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td> <?php echo e($key+1); ?> </td>
                                            <td><?php echo e($students->student_firstname .' '.$students->student_lastname); ?></td>
                                            <td><?php echo e($students->student_father_name); ?></td>
                                            <td><?php echo e($students->student_student_number); ?></td>
                                            <td> <?php echo e($students->getBasic()); ?></td>
                                            <td><?php echo e($students->getClass->class_name); ?></td>

                                            <td>
                                                <div class=" custom-checkbox">
                                                    <input value=" <?php echo e($students->student_id); ?> " type="checkbox"
                                                           name="student_ids[]" class="custom-check1" id="customCheck">
                                                </div>
                                            </td>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>

                                </table>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        </form>


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


            $('.custom-check1').change(function () {


                value = $('.custom-check1').val()
                console.log(value)

            })

            $('.bd-example-modal-lg').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                $('#form').find('input[name=student_id]').val(id)
            })


            $('.bd-modal-lg').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({

                    type: 'get',
                    url: 'discipline/student_chart',
                    data: {id: id},
                    success: function (data) {
                        if (data.length == 110) {
                            $('#chart').html('<h4>موردی برای نمایش وجود ندارد</h4>')
                        } else {

                            $('#chart').html(data)
                        }

                    }

                })

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

<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Discipline/AddCases.blade.php ENDPATH**/ ?>