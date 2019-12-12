<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ثبت نمره کارنامه</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="#"> کارنامه</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت نمره کارنامه</a>
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
            <form action="<?php echo e(route('ReportCard.InsertStudentScores')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class=" form-group col-md-4 ">
                        <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                        <select id="basic" name="basic" class=" custom-select  mb-3">
                            <option value="  ">انتخاب مورد</option>
                            <?php
                            $sis = session()->get('ManagerSis')['sections'];
                            if ($sis==4) {
                            $basics = \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                            }else{
                            $basics = \App\Models\BasicModel::where('section_id', $sis )->get();
                            }
                            ?>
                            <?php $__currentLoopData = $basics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->basic_id); ?>" <?php if( old('basic')==$item->basic_id ): ?>
                                selected=""
                                <?php endif; ?>><?php echo e($item->basic_name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>


                    <div class=" form-group col-md-4 ">
                        <label for="" class="  pt-3"> <span class="text-danger">*</span> کلاس </label>
                        <select id="class" name="class" class=" custom-select  mb-3">
                            
                            <option value=""> ابتدا پایه را انتخاب کنید</option>
                        </select>
                    </div>

                    <div class=" form-group col-md-4 ">
                        <label for="" class="  pt-3"> <span class="text-danger">*</span> انتخاب کارنامه </label>
                        <select id="report_card" name="report_card" class=" custom-select  mb-3">
                            <option value=""> ابتدا کلاس را انتخاب کنید</option>

                        </select>
                    </div>


                    <div class=" form-group col-md-6 ">
                        <label for="" class="  pt-3"> <span class="text-danger">*</span> درس (این لیست شامل درس هایست که در هنگام تعریف کارنامه ثبت شده است)</label>
                        <select id="lesson" name="lesson" class=" custom-select  mb-3">
                            <option value=""> باز کردن فهرست انتخاب</option>

                        </select>
                    </div>



                   
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th> کد ملی</th>
                                    <th> شماره دانش اموزی </th>
                                    <th>ثبت نمره</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="content-student">
                            </tbody>
                        </table>

                    </div>
                </div>
                <button class="btn btn-primary">
                    ثبت اطلاعات
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
                    data: {basic_id: basic_id},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])

                        }
                    }

                });

            });


            $("#class").change(function (e) {

                e.preventDefault();

                var class_id = $(this).val();
                
                $.ajax({

                    type: 'POST',
                    url: '<?php echo e(route("ReportCard.getReportCard")); ?>',
                    data: {class_id: class_id},
                    success: function (data) {

                        if (data.length !== 0) {

                            $('#report_card').html(data)

                        }else{
                            $('#report_card').html('<option>کارنامه ای برای این کلاس ثبت نشده است</option>')
                        }
                    }

                });

            });



            
            $("#report_card").change(function (e) {

            e.preventDefault();

            var report_card = $(this).val();

            $.ajax({

                type: 'POST',
                url: '<?php echo e(route("ReportCard.getReportCardLessons")); ?>',
                data: {report_card: report_card},
                success: function (data) {

                    if (data.length !== 0) {

                        $('#lesson').html(data)

                    }else{
                        $('#lesson').html('<option>هیچ درسی در این کارنامه ثبت نشده است</option>')
                    }
                }

            });

        });

            $("#class").change(function (e) {

                e.preventDefault();

                var class_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '<?php echo e(route("ReportCard.getStudents")); ?>',
                    data: {class_id: class_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#content-student').html(data)

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
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/ReportCard/ReportCardStudent.blade.php ENDPATH**/ ?>