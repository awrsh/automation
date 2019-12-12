;

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <div class="row">
   <div class=" col-md-12">
     
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
       <h5>نام مقاطع فعلی </h5>
<?php $__currentLoopData = \App\Models\SectionModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <a href="" class=" btn btn-info btn-rounded"><?php echo e($item->sections_name); ?></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
     


    <h5 class=" mt-3">نام </h5>
    <form action=" <?php echo e(route('Student.SubmitSection')); ?> " method="post">
     <?php echo csrf_field(); ?>
    <div class=" row">
      <div class=" form-group col-md-6">
        <input name="section_name" type="text" class="form-control"  required placeholder="نام مقطع ...">
        <button type="submit" class=" btn btn-primary mt-3">افزودن</button>
      </div>
    </div>

    </form>
 </div>
</div>

   </div>
  </div>
 </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Students/Classification/AddSection.blade.php ENDPATH**/ ?>