<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class=" col-md-12">
            <?php if(\Session::has('success')): ?>
            <div class="alert alert-success text-center">
                <p><?php echo e(\Session::get('success')); ?></p>
            </div><br />
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> فایل شما شامل کدام موارد است</h5>
                    
                    <form action="<?php echo e(route('Excel.export')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="import_data[]" value="firstname"
                                        class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">نام</label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="lastname" type="checkbox"
                                        class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">نام خانوادگی</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="certificate_number" type="checkbox"
                                        class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">شماره شناسنامه</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="national_number" type="checkbox"
                                        class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">کد ملی</label>
                                </div>
                            </div>

                        </div>

                        <div class=" row">
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="father_name" type="checkbox"
                                        class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">نام پدر</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="father_mobile" type="checkbox"
                                        class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">موبایل پدر</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="mother_mobile" type="checkbox"
                                        class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">موبایل مادر</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="birthday" type="checkbox"
                                        class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">تاریخ تولد</label>
                                </div>
                            </div>

                        </div>

                        <div class=" row mb-4">


                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="student_number" type="checkbox"
                                        class="custom-control-input" id="customCheck12">
                                    <label class="custom-control-label" for="customCheck12"> شماره دانش اموزی</label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="home_tel" type="checkbox"
                                        class="custom-control-input" id="customCheck13">
                                    <label class="custom-control-label" for="customCheck13">تلفن منزل</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="student_mobile" type="checkbox"
                                        class="custom-control-input" id="customCheck14">
                                    <label class="custom-control-label" for="customCheck14">موبایل دانش اموز</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="import_data[]" value="prev_school" type="checkbox"
                                        class="custom-control-input" id="customCheck15">
                                    <label class="custom-control-label" for="customCheck15">نام مدرسه قبلی</label>
                                </div>
                            </div>

                        </div>
                        <div class=" row">
                            <div class="form-group col-md-3">

                                <button type="submit" class="eximport btn btn-primary">خروجی </button>
                            </div>
                        </div>
                    </form>
                    


                    <form action="<?php echo e(route('Student.importEx')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class=" row">
                            <div class=" col-md-6">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div>
                                    <p class="_fileName text-primary pt-2" dir="ltr">

                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class=" row">
                            <div class=" col-md-6 mt-3">
                                <button   class="btn  submitImport btn-primary">ارسال </button>
                            </div>
                       
                        </div>


                    </form>









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
<script>
    $('#customFile').change(function(e){
 filename= e.target.files[0].name
  // var filename = $('input[type=file]')[0].files.length ? ('input[type=file]')[0].files[0].name : "";
$('._fileName').text(filename)
})
$('.eximport').click(function(){
    
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Students/ImportData.blade.php ENDPATH**/ ?>