;

<?php $__env->startSection('content'); ?>
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>  لیست دانش اموزان به تفکیک هر کلاس</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">دانش اموزان</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#"> لیست دانش اموزان</a>
                    </li>

                </ol>
            </nav>
        </div>



    </div>


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

                <form action=" <?php echo e(route('Student.changeBasicForStudent')); ?> " method="post">
                        <div class="row">
                          <?php echo csrf_field(); ?>
                              <label for="" class=" col-md-1 pt-2"> <span class="text-danger">*</span>تغییر پایه </label>
                              <select id="basic_id" name="basic_id" class="col-md-4 custom-select  mb-3">
                                   <?php
                                   
                               $session_id= \App\Models\School::where('school_name',session()->get('ManagerSis')['name'])->first()->school_sections;
                                   $basics =  \App\Models\BasicModel::where('section_id', $session_id )->get();
                                   
                               ?>
                               <?php $__currentLoopData = $basics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value=" <?php echo e($item->basic_id); ?> "><?php echo e($item->basic_name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                              </select>

                              <div>
                                  <button type="submit" class=" btn btn-primary mx-3">تایید</button>
                              </div>
                        </div>
               </form>
               <hr>
                            <?php if(count($classes)): ?>
                            
                            <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">

                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                      <a class="nav-link <?php echo e($key == 0 ? ' active':''); ?>" id="pills-<?php echo e($item->class_id); ?>-tab" data-toggle="pill" href="#pills-<?php echo e($item->class_id); ?> " role="tab" aria-controls="pills-<?php echo e($item->class_id); ?>" aria-selected="false"><?php echo e($item->class_name); ?></a>
                                     </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                                </ul>
    
    
                                <div class="tab-content" id="pills-tabContent2">
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <div class="tab-pane fade <?php echo e($key == 0 ? 'show active':''); ?>" id="pills-<?php echo e($item->class_id); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($item->class_id); ?>-tab">
    
    
    
                                            <table class="table table-striped table-bordered example2">
                                                    <thead>
                                                        <tr>
                                                            <th>ردیف</th>
                                                              <th>نام</th>
                                                              <th>نام خانوادگی</th>
                                                              <th>کد ملی</th>
                                                              <th>شماره شناسنامه</th>
                                                              <th> پایه</th>
                                                              <th>کلاس</th>
                                                              <th>ارسال پیامک به اولیاء</th>
                                                              <th>ویرایش</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
    
                                                        <?php $__currentLoopData = \App\Models\Student::where('student_student_class',$item->class_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                                                        <tr>
                                                            <td><?php echo e($key); ?></td>
                                                            <?php if($students->student_firstname): ?>
                                                            <td><?php echo e($students->student_firstname); ?></td>
                                                            <?php else: ?>
                                                            <td><a class='btn btn-danger btn-sm' href='<?php echo e(route('Student.EditStudent')); ?>/<?php echo e($students->student_id); ?>'>ثبت نام</a></td>
                                                            <?php endif; ?>
                                                            <?php if($students->student_lastname): ?>
                                                            <td><?php echo e($students->student_lastname); ?></td>
                                                            <?php else: ?>
                                                            <td><a class='btn btn-danger btn-sm' href='<?php echo e(route('Student.EditStudent')); ?>/<?php echo e($students->student_id); ?>'>ثبت نام خانوادگی</a></td>
                                                            <?php endif; ?>
                                                            <?php if($students->student_national_number): ?>
                                                            <td><?php echo e($students->student_national_number); ?></td>
                                                            <?php else: ?>
                                                            <td><a class='btn btn-danger btn-sm' href='<?php echo e(route('Student.EditStudent')); ?>/<?php echo e($students->student_id); ?>'>ثبت کد ملی</a></td>
                                                            <?php endif; ?>
                                                            <?php if($students->student_certificate_number): ?>
                                                            <td><?php echo e($students->student_certificate_number); ?></td>
                                                            <?php else: ?>
                                                            <td><a class='btn btn-danger btn-sm' href='<?php echo e(route('Student.EditStudent')); ?>/<?php echo e($students->student_id); ?>'> ثبت شماره شناسنامه</a></td>
                                                            <?php endif; ?>
                                                            <?php if($students->student_student_class): ?>
                                                            <?php
                                                               $class_ob = \App\Models\ClassModel::where('class_id',$students->student_student_class)->first();
                                                               $class= $class_ob->class_name;
                                                               $basic =\App\Models\BasicModel::where('basic_id',$class_ob->basic_id)->first()->basic_name;
                                                           ?>
                                                           <td><?php echo e($basic); ?></td>
                                                           <td><?php echo e($class); ?></td>
                                                           <?php else: ?>
                                                           <td><a class='btn btn-danger btn-sm' href='<?php echo e(route('Student.EditStudent')); ?>/<?php echo e($students->student_id); ?>'>تعیین پایه</a></td>
                                                           <td><a class='btn btn-danger btn-sm' href='<?php echo e(route('Student.EditStudent')); ?>/<?php echo e($students->student_id); ?>'>تعیین کلاس</a></td>
                                                            <?php endif; ?>
                                                            <td class="text-center"><a class='btn btn-success ' href='<?php echo e(route('Student.SendSMSView',$students)); ?>'> <i class="fa fa-envelope"></i>  </a> </td>

                                                            <td class="text-center"><a class='btn btn-outline-primary ' href='<?php echo e(route('Student.EditStudent')); ?>/<?php echo e($students->student_id); ?>'> <i class="icon ti-pencil"></i>&nbsp;  ویرایش  </a> </td>
                                                        </tr>
    
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
    
                                                    </tbody>
    
                                                </table>
    
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>
                                <p>کلاسی برای این پایه وجود ندارد</p>
                            <?php endif; ?>


        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datatable.js"></script>
<!-- begin::datepicker -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->

<script>
        $(document).ready(function(e){

    $('.bd-example-modal-lg').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
     $('#form').find('input[name=student_id]').val(id)
    })


    $('.bd-modal-lg').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      $.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$.ajax({

type:'get',
url:'discipline/student_chart',
data:{id:id},
success:function(data){
    if (data.length == 110) {
        $('#chart').html('<h4>موردی برای نمایش وجود ندارد</h4>')
    }else{

   $('#chart').html(data)
    }

}

        })

        })


        })
        </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

<?php $__env->stopSection(); ?>





<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Students/List.blade.php ENDPATH**/ ?>