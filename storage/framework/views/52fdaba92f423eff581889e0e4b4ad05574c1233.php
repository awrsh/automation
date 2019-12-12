;

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3 style="color: #a4aac1;
            text-shadow: 0 1px 1px black;"> گزارش انظباطی دانش اموز </h3>
            
        </div>
        


    </div>



    
        <div class="card">
            <div class=" card-header">
                <h6 >
                    لیست موارد انظباطی 
                </h6>
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

                        
        
                      

                <?php if(count($student->getCasesLaw)): ?>
                <div class="accordion custom-accordion">
                        <?php $__currentLoopData = $student->getCasesLaw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-row <?php echo e($key == 0 ? 'open':''); ?>">
                            <a href="#" class="accordion-header">
                                <span>عنوان: <?php echo e(\App\Models\DisciplineLawsModel::where('law_id',$case->law_id)->first()->law_title); ?> 
                                </span>
                                <span>تاریخ: <?php echo e(\Morilog\Jalali\Jalalian::forge($case->case_date)->format('%B %d، %Y')); ?></span>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Students.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Students/Pannel/DisciplineReport.blade.php ENDPATH**/ ?>