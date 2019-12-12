<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست مدارس</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مدارس</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">لیست مدارس</a>
                    </li>

                </ol>
            </nav>
        </div>
    </div>


    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام مدرسه</th>
                        <th>نام مدیر</th>
                        <th>تلفن مدیر</th>
                        <th>نام کاربری </th>
                        <th>کلمه عبور</th>
                        <th>URL</th>
                        <th>تعداد دانش آموز</th>
                        <th>آدرس</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody id="content">
                    <?php
                    $i=1;
                    $list = \App\Models\School::get();
                    ?>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $Pass
                    =\App\Models\Admin\PasswordListSchoolModel::where('school_id',$item->school_id)->first()->pass_txt;

                    if($item->school_status =="off"){
                    $status ="غیر فعال";
                    $color ='danger';
                    $data_status='on';
                    }else {
                    $status ='فعال';
                    $color = "success";
                    $data_status='off';
                    }
                    ?>
                    <tr>
                        <td><?php echo e($i); ?></td>
                        <td><?php echo e($item->school_name); ?></td>
                        <td><?php echo e($item->school_name_manager); ?></td>
                        <td><?php echo e($item->school_phone_manager); ?></td>
                        <td><?php echo e($item->school_username); ?></td>
                        <td><?php echo e($Pass); ?></td>
                        <td class="text-left" style="direction: ltr;" title="<?php echo e($item->school_url); ?>">
                            <?php echo e(\Illuminate\Support\Str::limit($item->school_url,12)); ?></td>
                        <td><?php echo e($item->school_count_students); ?> نفر</td>
                        <td title="<?php echo e($item->school_address); ?>">
                            <?php echo e(\Illuminate\Support\Str::limit($item->school_address,8)); ?></td>
                        <td><a href="#" id="change_status-<?php echo e($i); ?>" class="btn change_status btn-<?php echo e($color); ?>  btn-sm btn-uppercase" 
                        data-data="<?php echo e($data_status); ?>"  data-id="<?php echo e($item->school_id); ?>"><?php echo e($status); ?></a></td>
                        <td class="text-center"><a href="#"
                                class="btn  btn-sm btn-outline-warning  btn-square btn-uppercase"><i
                                    class="icon ti-pencil"></i>ویرایش</a></td>
                        <td class="text-center"><a href=""
                                class="btn btn-sm btn-outline-danger btn-square btn-uppercase"><i
                                    class="icon ti-trash "></i>حذف</a></td>
                    </tr>
                    <?php
                    $i++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datatable.js"></script>
<script>
    (function () {
            'use strict';
            window.addEventListener('load', function () {
                
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');

                    }, false);
                });
            }, false);

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          

            $(".change_status").click(function(e){
                e.preventDefault();
                var id_school = $(this).data('id');     
                var status = $(this).data('data');   
               
                $.ajax({

                    type:'POST',
                    url:'ChangeStatusSchool',
                    data:{id_school:id_school,status:status},
                    success:function(data){
                     location.reload();
                    },
                    error:function(data){
                     
                      

                    }

                });

            });
        


        })();
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Admin.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Admin/ListSchool.blade.php ENDPATH**/ ?>