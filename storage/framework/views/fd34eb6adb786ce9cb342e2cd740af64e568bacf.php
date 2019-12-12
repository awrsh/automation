;

<?php $__env->startSection('content'); ?>
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3> وضعیت مطالعاتی </h3>
            
        </div>



    </div>




    <div class="card">
        <div class="card-header">
            <h6 class="text-muted">فرم شامل کلاس های مرتبط با معلم میشود</h6>
        </div>
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

            <form id="form" action="  " method="post">
                <?php echo csrf_field(); ?>

                


                <div class="row date__picker">
                    <div class="col-md-5  ">

                        <label for="">از تاریخ</label>
                        <input type="text" id="case_start_date" name="case_start_date"
                            class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">
                    </div>
                    <div class="col-md-5">
                        <label for="">تا تاریخ</label>
                        <input type="text" id="case_end_date" name="case_end_date"
                            class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">

                    </div>

                </div>
                <div class="row mt-3">
                    <div class="form-group col-md-5">
                        <label for="">نام درس: </label>
                        
                        <select  class="custom-select" name="lesson_id" id="lesson_id">
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

                        <select  class="custom-select" name="class_id" id="class_id">
                            <option value="">باز کردن فهرست انتخاب</option>
                            <?php $__currentLoopData = array_unique(auth()->guard('teacher')->user()->teacher_lessons()->pluck('class_name','class_id')->toArray()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?>

                            </option>
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
    $(document).ready(function(e){
    
 $.ajaxSetup({

   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});


$("#form").submit(function(e){
e.preventDefault();

$('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')
var lesson_id = $(this).find('#lesson_id').val();
var class_id = $(this).find('#class_id').val();
var start_date = $(this).find('#case_start_date').val();
var end_date = $(this).find('#case_end_date').val();


$.ajax({

type:'POST',
url:'<?php echo e(route("Teachers.WorkSpace.getStudyingReport")); ?>',
data:{
  lesson_id:lesson_id,
  class_id:class_id,
  start_date:start_date,
  end_date:end_date
},
success:function(data){
    if(data.length == 218){
        $('#content').html('<p>اطلاعاتی برای این کلاس وجود ندارد</p>') 
        $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')

    }else{
        $('#content').html(data)
    $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
   
}

   

},
        error:function(data){
   
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
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Teachers.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Teachers/Pannel/StudyingReportList.blade.php ENDPATH**/ ?>