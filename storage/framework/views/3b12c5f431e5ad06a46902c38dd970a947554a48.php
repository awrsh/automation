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

    
    <form action=" <?php echo e(route('Student.SubmitClass')); ?> " method="post">
     <?php echo csrf_field(); ?>
    <div class=" row mt-2">
        
      <div class=" form-group col-md-4">
        <label for="">پایه</label>
        <select id="basic" name="basic" class="custom-select mb-3">
          <option value="" selected="">باز کردن فهرست انتخاب</option>
        
     <?php $__currentLoopData = \App\Models\BasicModel::where('section_id',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <option value="<?php echo e($item->basic_id); ?>" ><?php echo e($item->basic_name); ?></option>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
      </select>
      </div>
      <div class=" form-group col-md-4">
          <label for="">نام</label>
          <input name="class_name" type="text" class="form-control"  placeholder="نام کلاس ...">
        </div>
        <div class="form-group col-md-6">
          <button type="submit" class=" btn btn-primary mt-3">افزودن</button>
        </div>
      </div>


      <div class="row">
          <div class="col-md-6">
            <div class="basic__classes ">

            </div>

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

<?php $__env->startSection('css'); ?>
    <style>
    
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
 <script>
 $(".popover").popover({ trigger: "hover" });
 $.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$("#basic").change(function(e){
e.preventDefault();
var basic_id = $(this).val();

$.ajax({

  type:'POST',
  url:'view_classes',
  data:{basic_id:basic_id},
  success:function(data){
    
     if (data.length > 360) {
      $('.basic__classes').html(data)
     }else{
       $('.basic__classes').html('<p>برای این پایه هنوز کلاسی ثبت نشده است</p>')
     }
    // $('#basic').html(data)
  
      // $('#basic').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
    }

  

   

  });

})
 </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Students/Classification/AddClass.blade.php ENDPATH**/ ?>