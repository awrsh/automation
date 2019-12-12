;

<?php $__env->startSection('content'); ?>
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3> گزارش انظباطی دانش اموز </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مطالعاتی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">گزارش انظباطی دانش اموز</a>
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

                        <div class="profile row">
                            <div class="col-sm-6 p-3 mb-5">
                                <div class="d-flex">
                                    <div class=" col-sm-6 col-md-3">
                                       <?php if($student->student_student_photo ): ?>
                                       
                                    <img src=" <?php echo e(route('BaseUrl')); ?>/uploads/students/<?php echo e($student->student_student_photo); ?>" style="width: 100px;" class="img-thumbnail" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(route('BaseUrl')); ?>/Pannel/img/avatar.jpg" style="width: 100px;" class="img-thumbnail" alt="">

                                       <?php endif; ?>
                                    </div>
                                    <div class="col-md-9 mt-3">
                                        <p class=" lead"><?php echo e($student->student_firstname .' _ '. $student->student_lastname); ?></p>
                                        <p class="">کلاس <?php echo e($student->getClass->class_name); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-sm-6">
                              
                                                                
                                <div class="text-left">
                                  <a href="#" class=" btn btn-sm btn-secondary">دریافت pdf</a>
                             
                                </div>
                             
                            </div>
                        </div>
        
                         
                        
                        

                       


                <?php if(count($student->getCasesLaw)): ?>
                <div class="accordion custom-accordion">
                        <?php $__currentLoopData = $student->getCasesLaw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-row <?php echo e($key == 0 ? 'open':''); ?>">
                            <a href="#" class="accordion-header">
                                <span><?php echo e(\App\Models\DisciplineLawsModel::where('law_id',$case->law_id)->first()->law_title); ?> 
                                </span>
                                <span><?php echo e(\Morilog\Jalali\Jalalian::forge($case->case_date)->format('%B %d، %Y')); ?></span>
                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                            </a>
                            <div class="accordion-body">
                                <p> <?php echo e($case->case_descriotion); ?>  </p>
                                
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
                </div>  
                <?php else: ?>
                <p>مورد انظباطی ثبت نشده است</p>
                <?php endif; ?>
                                
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
    
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Discipline/DisciplineReportStudent.blade.php ENDPATH**/ ?>