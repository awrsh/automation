<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ثبت حضور غیاب کلاسی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   
                    <li class="breadcrumb-item"><a href="#">فعالیت کلاسی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت حضور غیاب کلاسی</a>
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
            <form action="<?php echo e(route('activity_class.insertAbsence')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">


                    <div class="form-group col-md-5">
                        <label for="">نام درس: </label>

                        <select class="custom-select" name="lesson" id="lesson">
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

                        <select class="custom-select" name="class_id" id="class_id">
                            <option value="">باز کردن فهرست انتخاب</option>
                            <?php $__currentLoopData = array_unique(auth()->guard('teacher')->user()->teacher_lessons()->pluck('class_name','class_id')->toArray()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                        <div class="col-md-4">
                                <label for="">تاریخ</label>
                                <input type="text" name="case_date"
                                       class="form-control text-right date-picker-shamsi-list" dir="ltr"
                                       autocomplete="off">
                            </div>
                </div>

            



                <div class="table-responsive">
                    <table class="table table-striped table-bordered  ">
                        <thead>
                            <tr>
                                <th>نام و نام خانوادگی</th>
                                <th>شماره دانش اموزی</th>
                                <th>کلاس</th>
                                <th>پایه</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="content-student">
                        </tbody>
                    </table>

                </div>

                <div class="row">
                    <div class="col-md-4  mb-3 ">
                        <button class="btn btn-primary btn__submit " >
                            وارد کردن
                        </button>
                    </div>
                </div>
        </div>
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

        $(document).on('change','.switch',function () {
                           var i = $(this).val();
                            if ($(this).is(':checked')) {
                                $(this).next().html('<span class="text-success">حاضر</span>');
                                $("#sts-"+i).val('حاضر');
                            } else {
                                $(this).next().html('<span class="text-danger">غایب</span>');
                                $("#sts-"+i).val('غایب');
                            }

                        })


            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        

         

            $("#class_id").change(function (e) {

                e.preventDefault();

                var class_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '<?php echo e(route("Teachers.WorkSpace.getStudent")); ?>',
                    data: {class_id: class_id,},
                    success: function (data) {

                      console.log(data)

                            $('#content-student').html(data)

                        
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
<?php echo $__env->make('Layouts.Teachers.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Teachers/Pannel/Status_Absence.blade.php ENDPATH**/ ?>