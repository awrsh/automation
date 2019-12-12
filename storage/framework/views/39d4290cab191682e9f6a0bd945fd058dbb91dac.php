;

<?php $__env->startSection('content'); ?>
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
      <div class="card">
          <div class="card-body">
              <div class="card-title"> اطلاعات خود را از طریق فایل اکسل وارد نمایید</div>
              <form action="/file-upload" class="dropzone dz-clickable" id="my-awesome-dropzone"><div class="dz-default dz-message"><span>فایل ها را برای ارسال اینجا بکشید</span></div></form>
          </div>
      </div>
  </div>
</div>
  </div>
 </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
   
    <!-- begin::dropzone -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dropzone/dropzone.css" type="text/css">
    <!-- begin::dropzone -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<!-- begin::dropzone -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dropzone/dropzone.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/dropzone.js"></script>
<!-- end::dropzone -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin_pannel\resources\views/User/Students/ImportData.blade.php ENDPATH**/ ?>