;

<?php $__env->startSection('content'); ?>
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="card">
    <div class="card-body">
        <h5 class="card-title">مراحل بارگذاری عکس ها : </h5>
        <p>
         1 - عکس دانش آموزان را به نام کد ملی یا شماره دانش آموزی ذخیره کنید       
        </p>
        <p>
         2 - نحوه نامگذاری عکس ها را مشخص کنید
        </p>
        <p>   
         3 - دکمه بارگذاری عکس ها را زده و عکس ها را انتخاب کنید
        </p>
    </div>
    <div class=" card-footer">
     <p>   
      نحوه نامگذاري عكس ها
     </p>
     <div class="form-group">
      <div class="custom-control custom-radio">
          <input type="radio" id="customRadio" name="r" class="custom-control-input" checked>
          <label class="custom-control-label" for="customRadio">نام فايل ها بر اساس كد ملي یا شماره شناسنامه
          </label>
      </div>
  </div>
  <div class="form-group">
   <div class="custom-control custom-radio">
       <input type="radio" id="customRadio2" name="r" class="custom-control-input" >
       <label class="custom-control-label" for="customRadio2">نام فايل ها بر اساس شماره دانش آموزي
       </label>
   </div>
</div>
<div class="custom-file col-md-3">
 <input type="file" class="custom-file-input" id="customFile">
 <label class="custom-file-label" for="customFile">انتخاب فایل</label>
</div>
    </div>
</div>
  </div>
</div>
  </div>
 </div>
</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin_pannel\resources\views/User/Students/UploadPhoto.blade.php ENDPATH**/ ?>