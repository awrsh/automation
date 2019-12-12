;

<?php $__env->startSection('content'); ?>
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
    <div class="card">
      <div class="card-body">
          <h5 class="card-title"> ثبت نام دانش اموز</h5>
          <div id="wizard2">
              <h3>اطلاعات شخصی</h3>
              <section>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با</p>
                  <form id="form1" method="post" action=" <?php echo e(route('Student.Register')); ?> ">
                    <?php echo csrf_field(); ?>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>نام</label>
                          <input type="text" class="form-control" >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label>نام خانوادگی</label>
                          <input type="text" class="form-control" name="lastname"  >
                         
                      </div><!-- form-group -->
                      </div>

                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>شماره شناسنامه</label>
                          <input type="text" class="form-control" >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label> کد ملی</label>
                          <input type="text" class="form-control" name="lastname"  >
                         
                      </div><!-- form-group -->
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>نام پدر</label>
                          <input type="text" class="form-control" >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label>  موبایل پدر</label>
                          <input type="text" name="date-picker-shamsi-list" class="form-control text-right" dir="ltr" >
                          
                      </div><!-- form-group -->
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label> موبایل مادر</label>
                          <input type="text" class="form-control" >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label> تاریخ تولد</label>
                          <input type="text" name="date-picker-shamsi-list" class="form-control text-right" dir="ltr" >
                          
                      </div><!-- form-group -->
                      </div>
                  
              </section>

              <h3>اطلاعات دانش اموزی</h3>
              <section>
                
                  
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> مقطع دانش آموز</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>  پایه دانش آموز</label>
                    <input type="text" name="" class="form-control text-right" dir="ltr" required>
                    
                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> کلاس دانش آموز</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>  شماره دانش اموزی</label>
                    <input type="text" name="" class="form-control text-right" dir="ltr" required>
                    
                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> تلفن منزل</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>   موبایل دانش اموز</label>
                    <input type="text" name="" class="form-control text-right" dir="ltr" required>
                    
                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> نام مدرسه قبلی</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label> اپلود عکس(3X4) </label>
                    <input type="file" name="" class="form-control-file text-right" dir="rtl" required>
                    
                </div><!-- form-group -->
                </div>
                  </form>
              </section>
              
          </div>
      </div>
  </div>
  </div>
</div>
  </div>
 </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <!-- begin::form wizard -->
    <link rel="stylesheet" href=" <?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/form-wizard/jquery.steps.css" type="text/css">
    <!-- end::form wizard -->
    
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- begin::form wizard -->
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/form-wizard/jquery.steps.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/form-wizard.js"></script>
    <!-- end::form wizard -->

    
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/toast.js"></script>

<!-- begin::datepicker -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin_pannel\resources\views/User/Students/Register.blade.php ENDPATH**/ ?>