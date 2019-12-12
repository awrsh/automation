;

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <div class="row">
   <div class=" col-md-12">
     
    <div class="card">
     <div class="card-body"> 
       


    
    <form action=" <?php echo e(route('Student.SubmitBasic')); ?> " method="post">
     <?php echo csrf_field(); ?>
    <div class=" row mt-2">
      <div class=" form-group col-md-6">
        <label for="">نام</label>
        <input name="basic_name" type="text" class="form-control"  placeholder="نام پایه ...">
      </div>
      <div class=" form-group col-md-6">
        <label for="">مقطع</label>
        <select name="section_id" class="custom-select mb-3">
          <option selected="">باز کردن فهرست انتخاب</option>
          <?php $__currentLoopData = \App\models\SectionModel::all();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value=" <?php echo e($item->sections_id); ?> "><?php echo e($item->sections_name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
      </select>
      </div>
        <div class="form-group col-md-6">
          <button type="submit" class=" btn btn-primary mt-3">افزودن</button>
        </div>
      </div>
    </div>

    </form>
 </div>
</div>

   </div>
  </div>
 </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Students/Classification/AddBasic.blade.php ENDPATH**/ ?>