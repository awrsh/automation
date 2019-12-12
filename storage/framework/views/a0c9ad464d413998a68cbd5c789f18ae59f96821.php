;

<?php $__env->startSection('content'); ?>
<div class="container-fluid">


    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>تعریف کارنامه</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="#">کارنامه</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">تعریف کارنامه</a>
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

            <form id="form" action=" <?php echo e(route('ReportCard.Insert')); ?> " method="post">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <div class="row">



                        <div class=" form-group col-md-6 ">
                            <label for="" class="  "> <span class="text-danger">*</span> پایه </label>
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
                    </div>
                    <div class=" row">
                        <div class=" form-group col-md-6 ">
                            <label for="" class="  "> <span class="text-danger">*</span> کلاس </label>
                            <select id="class" name="class" class=" custom-select  mb-3">
                                <option value="">ابتدا پایه را انتخاب کنید</option>
                            </select>
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="">گروه ازمون</label>
                            <select name="azmoon_group" id="azmoon_group" class="custom-select form-control custom-select-sm mb-3">
                                <option value="تکوینی 1">تکوینی 1</option>
                                <option value="پایانی 1">پایانی 1</option>
                                <option value="تکوینی 2">تکوینی 2</option>
                                <option value="پایانی 2">پایانی 2</option>
                                <option value="ماهانه مهر">ماهانه مهر</option>
                                <option value="ماهانه آبان">ماهانه آبان</option>
                                <option value="ماهانه بهمن">ماهانه بهمن</option>
                                <option value="ماهانه اسفند">ماهانه اسفند</option>
                                <option value="ماهانه اردیبهشت">ماهانه اردیبهشت</option>
                            </select>
                        </div>
                    </div>

                    
       
        <div class="row">
            <div class="col-md-12  mb-3 button__wrapper">

                <button type="submit" class=" btn btn-primary"> مشاهده کارنامه</button>
            </div>
        </div>
    </div>
    </form>


    <div class="row table">
        
       
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
                    url: '<?php echo e(route("ReportCard.getReportCardClasses")); ?>',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])
                           
                        }
                    }

                });

            });



  $("#form").submit(function(e){
   e.preventDefault();
   $('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')
   var class_id = $(this).find('#class').val();
   var azmoon_group = $(this).find('#azmoon_group').val();
   // console.log({basic,start_date,end_date})
   $.ajax({
    type:'POST',
    url:'<?php echo e(route("ReportCard.getStudentTable")); ?>',
    data:{
        class_id:class_id,
        azmoon_group:azmoon_group,
       
   },
   success:function(data){
    console.log(data)

       $('.table').html(data)
       $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> مشاهده کارنامه</button>')
      
        },
        error:function(data){
            console.log(data)
    
       $('.button__wrapper').html(' <button type="submit" class=" btn btn-danger">مشاهده کارنامه</button>')
       $('.law_title__error').text(data.responseJSON.errors.law_title)
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
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/ReportCard/ClassesReportCard.blade.php ENDPATH**/ ?>