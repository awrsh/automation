<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3>گزارش گیری کلاسی</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                        <li class="breadcrumb-item"><a href="#">گزارشات</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">گزارش گیری کلاسی<</a>
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
                        <p>  <?php echo e(\Session::get('success')); ?></p>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('Reports.ClassAvg')); ?>" method="post">
                    <?php echo csrf_field(); ?>
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

                       


                            <div class="col-md-4 mb-3">
                                <label for="" class=" pt-3">گروه ازمون</label>
                                <select name="examin_group" class="custom-select form-control custom-select-sm mb-3">
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
                    <button class="btn btn-primary">
                       مشاهده 
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

          
        

        })


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->
    <style>
        #ui-datepicker-div{
            z-index: 3000!important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Reports/ClassAvgReport.blade.php ENDPATH**/ ?>