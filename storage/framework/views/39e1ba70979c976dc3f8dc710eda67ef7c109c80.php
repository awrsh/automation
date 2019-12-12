;

<?php $__env->startSection('content'); ?>
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3 style="color: #a4aac1;
            text-shadow: 0 1px 1px black;"> داشبورد </h3>
            
        </div>

    </div>

    <div class="card">

        <div class=" card-header">


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
                <div class="col-sm-6 p-3">
                    <div class="d-flex">
                        <div class=" col-sm-6 col-md-3">
                            <?php if($teacher->teacher_profile ): ?>

                        <img src=" <?php echo e(route('BaseUrl')); ?>/uploads/Teachers/Profile/<?php echo e($teacher->teacher_fullname); ?>/<?php echo e($teacher->teacher_profile); ?>"
                                style="width: 100px;" class="img-thumbnail" alt="">
                            <?php else: ?>
                            <img src="<?php echo e(route('BaseUrl')); ?>/Pannel/img/avatar.jpg" style="width: 100px;"
                                class="img-thumbnail" alt="">

                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                اطلاعات
                <a href="#" class="btn-sm primary-font" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="ti-pencil m-l-5"></i> ویرایش
                </a>
            </h5>
            <div class="row mb-2">
                <div class="col-3 text-muted">نام و نام خانوادگی: </div>
                <div class="col-9"><?php echo e($teacher->teacher_fullname); ?></div>
            </div>

            <div class="row mb-2">
                <div class="col-3 text-muted">تلفن:</div>
                <div class="col-9"><?php echo e($teacher->teacher_mobile); ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">ایمیل:</div>
                <div class="col-9"><?php echo e($teacher->teacher_email); ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">شهر:</div>
                <div class="col-9"><?php echo e($teacher->teacher_birthplace); ?> </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">آدرس:</div>
                <div class="col-9"><?php echo e($teacher->teacher_address); ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">بیوگرافی: </div>
                <div class="col-9"><?php echo e($teacher->teacher_biography); ?></div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-15">
            <form id="form" action=" <?php echo e(route('Teachers.WorkSpace.EditProfile',$teacher)); ?> " method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <h5 class="text-center mt-2 modal__header" >فرم ویرایش اطلاعات</h5>

                <div class="row my-3">
                    <div class="col-md-6">
                        <label class="text-muted" for="">نام و نام خانوادگی: </label>
                        <input type="text" value="<?php echo e($teacher->teacher_fullname); ?> " name="teacher_fullname"
                            class="form-control text-right " dir="ltr">
                    </div>
              
                    <div class="col-md-6">
                        <label class="text-muted" for="">تلفن:  </label>
                        <input type="text" value="<?php echo e($teacher->teacher_mobile); ?> " id="teacher_mobile" name="teacher_mobile"
                            class="form-control text-right " dir="ltr" 
                           
                            >
                    </div>
                </div>
                <input type="hidden" value="<?php echo e($teacher->id); ?>" name="teacher_id">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted" for="">ایمیل:</label>
                        <input type="text" value="<?php echo e($teacher->teacher_email); ?> " name="teacher_email"
                            class="form-control text-right " dir="ltr">
                    </div>
             
                    <div class="col-md-6">
                        <label class="text-muted" for="">شهر: </label>
                        <input type="text" value="<?php echo e($teacher->teacher_birthplace); ?> " name="teacher_birthplace"
                            class="form-control text-right " dir="ltr">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="text-muted" for="">اپلود عکس پروفایل:  </label>
                       <input type="file" class=" form-control" name="teacher_profile" id="teacher_profile">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="text-muted" for="">آدرس: </label>
                        <textarea type="text"  name="teacher_address"
                            class="form-control text-right " dir="ltr"><?php echo e($teacher->teacher_address); ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5 class=" mt-2 text-muted"> بیوگرافی: </h5>
                        <textarea type="text" name="teacher_biography" class="form-control text-right "
                            dir="ltr"><?php echo e($teacher->teacher_biography); ?> </textarea>
                    </div>
                </div>

           

                <div class="row mb-3">
                    <div class="col-md-12 text-center mt-3">
                        <button type="button" class="btn btn-secondary mx-3" data-dismiss="modal">لغو</button>
                        <button type="submit" class=" btn btn-success">تایید</button>
                    </div>
                </div>




        </div>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>

var teacher_mobile = document.getElementById('teacher_mobile');
teacher_mobile.oninvalid = function(event) {

event.target.setCustomValidity('شماره موبایل باید 11 رقم باشد');

}
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Teachers.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Teachers/Pannel/Dashboard.blade.php ENDPATH**/ ?>