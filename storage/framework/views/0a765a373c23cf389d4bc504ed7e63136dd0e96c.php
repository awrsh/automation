;

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">


        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3> کارنامه مطالعاتی </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="#">مطالعاتی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">کارنامه مطالعاتی</a>
                        </li>

                    </ol>
                </nav>
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

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form id="form" action=" " method="post">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class=" custom-select  mb-3">
                                <option value="  ">انتخاب مورد</option>
                                <?php
                                    $sis = 1;
                                    if ($sis==4) {
                                      $basics =  \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                                    }else{
                                      $basics =  \App\Models\BasicModel::where('section_id', $sis )->get();
                                    }
                                ?>
                                <?php $__currentLoopData = $basics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=" <?php echo e($item->basic_id); ?> "><?php echo e($item->basic_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12  my-3 button__wrapper">

                            <button type="submit" class=" btn btn-primary"> نمایش</button>
                        </div>
                    </div>
                </form>
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
                        console.log()

                        if (data.length == 180) {
                            $('#content').html('<p>موردی برای نمایش وجود ندارد</p>')
                            $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')

                        } else {

                            $('#content').html(data)
                            $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
                        }


                    },
                    error: function (data) {

                        $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
                        alert('لطفا ورودی ها را تکمیل کنید')
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

<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Studying/StudyingReportClassList.blade.php ENDPATH**/ ?>