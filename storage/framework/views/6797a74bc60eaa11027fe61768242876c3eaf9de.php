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

            <form action=" <?php echo e(route('Student.WorkSpace.StudyingReportInsert')); ?> " method="post">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <div class="row">
                        <div class="col-md-4  mb-3">

                            <label for=""> تاریخ انجام مطالعه </label>
                            <input type="text" value=" <?php echo e(old('case_start_date')); ?> " name="studies_students_date"
                                class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-md-6">
                            <h6 class="card-title mb-1">درس </h6>
                            <select name="lesson_id" id="lesson_id" class="custom-select  mb-3">
                               <option value="">باز کردن فهرست انتخاب</option>
                                <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lesson->id); ?>"><?php echo e($lesson->lesson_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    
                            <div class="col-md-6">
                                <h6 class="card-title mb-1">الگوی مطالعه درس</h6>
                                <select name="study_model" id="study_model" class="custom-select  mb-3">
                                   
                                </select>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                        <h6 class="card-title mb-1">میزان مطالعه شما بر حسب دقیقه: </h6>
                                        <input type="number" name="count" id="">
                                    </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12  my-3">

                            <button type="submit" class=" btn btn-primary btn__info"> ثبت اطلاعات</button>
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
    $(document).ready(function(e){
          
    //    $('.btn__info').prop('disabled',true)
    //    $('.ee').blur(function(){

    //     if($(this).val() == ''){
    //     $('.btn__info').prop('disabled',true)
    //    }else{
    //     $('.btn__info').prop('disabled',false)
    //    }
    //    })
     
    $.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$("#lesson_id").change(function(e){
e.preventDefault();
var lesson_id = $(this).val();
$.ajax({

    type:'POST',
    url:'<?php echo e(route("Students.WorkSpace.getStudyModel")); ?>',
    data:{lesson_id:lesson_id},
    success:function(data){
        console.log(data.length)
        if (data.length !== 51) {
            
            $('#study_model').html(data)
        }else{
            $('#study_model').html('<option value="0">الگوی فعالی برای این درس وجود ندارد</option>')
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
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Students.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Students/Pannel/StudyingReport.blade.php ENDPATH**/ ?>