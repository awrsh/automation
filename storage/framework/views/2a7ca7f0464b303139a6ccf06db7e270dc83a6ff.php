;

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">


        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3>تعریف الگوی مطالعاتی</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                        <li class="breadcrumb-item"><a href="#">انضباطی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">تعریف الگوی مطالعاتی</a>
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

                <form action=" <?php echo e(route('Studing.InsertStudy')); ?> " method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <div class="row">
                            <div class=" form-group col-md-4">
                                <label for=""> عنوان الگو</label>
                                <input name="studies_name" type="text" class="form-control" placeholder=""
                                       value=" <?php echo e(old('studies_name')); ?> ">
                            </div>
                            <div class="col-md-6 text-center mt-4">
                                <label class="card-title mt-2 "> بازه زمانی :
                                </label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="یک سال" <?php if( old('studies_date') == 'یک سال' ): ?>
                                    checked
                                           <?php endif; ?>  id="customRadioInline1" name="studies_date"
                                           class="custom-control-input ">
                                    <label class="custom-control-label" for="customRadioInline1"> یک سال </label>
                                </div>
                                
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="انتخاب بازه زمانی" id="customRadioInline3"
                                           name="studies_date" class="custom-control-input"
                                           <?php if( old('studies_date') == 'انتخاب بازه زمانی' ): ?>
                                           checked
                                        <?php endif; ?>>
                                    <label class="custom-control-label" for="customRadioInline3"> انتخاب بازه
                                        زمانی </label>
                                </div>
                            </div>
                        </div>
                        <div class="row date__picker" style="display:none">
                            <div class="col-md-5  mt-2">

                                <label for="">از تاریخ</label>
                                <input type="text" value=" <?php echo e(old('case_start_date')); ?> " name="case_start_date"
                                       class="form-control text-right date-picker-shamsi-list" dir="ltr"
                                       autocomplete="off">
                            </div>
                            <div class="col-md-5  mt-2">
                                <label for="">تا تاریخ</label>
                                <input type="text" value=" <?php echo e(old('case_end_date')); ?> " name="case_end_date"
                                       class="form-control text-right date-picker-shamsi-list" dir="ltr"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-4 ">
                                <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                                <select id="basic" name="basic" class=" custom-select  mb-3">
                                    <option value="  ">انتخاب مورد</option>
                                    <?php
                                        $sis = session()->get('ManagerSis')['sections'];
                                        if ($sis==4) {
                                          $basics =  \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                                        }else{
                                          $basics =  \App\Models\BasicModel::where('section_id', $sis )->get();
                                        }
                                    ?>
                                    <?php $__currentLoopData = $basics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->basic_id); ?>" <?php if( old('basic') == $item->basic_id ): ?>
                                        selected=""
                                            <?php endif; ?>><?php echo e($item->basic_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class=" form-group col-md-4 ">
                                <label for="" class="  pt-3"> <span class="text-danger">*</span> کلاس </label>
                                <select id="class" name="class" class=" custom-select  mb-3">
                                </select>
                            </div>
                            
                        </div>

                        
                        <div id="lesson" class=" row">
                        </div>
                        <div class="row">
                            <div class="col-md-12  mb-3">

                                <button type="submit" class=" btn btn-primary"> افزودن مورد</button>
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

            $('input[name=studies_date]').change(function () {
                if ($(this).val() == 'انتخاب بازه زمانی') {
                    $('.date__picker').fadeIn()
                } else {
                    $('.date__picker').fadeOut()
                }
            })

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
                    url: 'getStudyClasses',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])
                            $('#lesson').html(data[1])
                        }
                    }

                });

            });

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

<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Studying/StudyingInsert.blade.php ENDPATH**/ ?>