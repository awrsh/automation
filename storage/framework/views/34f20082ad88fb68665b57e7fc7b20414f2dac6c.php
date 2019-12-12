<?php if($errors->any()): ?>

    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p class="m-3"><?php echo e($error1); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php endif; ?>
<?php if(isset($error)): ?>
<div class="alert alert-danger">
<p style="color: #ff3d00;" ><?php echo e($error); ?></p>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\automation\resources\views/Form/errors.blade.php ENDPATH**/ ?>