<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/bundle.css" type="text/css"> 
 <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/css/app.css" type="text/css">
 <title>Document</title>
 <style>
   .flex__column{
       display: flex;
   flex-direction: column;
   align-items: center;

  
  
   padding: 10px;
   cursor: default!important;
   }

 

   .flex__column > span{
       margin-top: 7px;
   }
   </style>
</head>
<body dir="rtl">
  <div class="container-fluid">
    <div class="row">
        <div class=" col-md-12">
    
            <div class="card print">
              
                <div class="card-body">
                  <div class="card-header">
                     <h4 class=" text-center">لیست دانش اموزان</h4>
                     <div class="" style="display:flex;justify-content: space-between;margin-top:30px;
                     height:130px;border:1px solid;    padding:10px 12px 0 12px;">
                      <div style="display: flex;
                      flex-direction: column;
                      justify-content: flex-end;>
                        <img class="logo" src="" alt="">
                        <p> نام کلاس: <?php echo e($class->class_name); ?></p>
                      </div>
                      <p><?php echo e(session()->get('ManagerSis')['name']); ?>

                      </p>
                      <div style="display: flex;
                      flex-direction: column;
                      justify-content: flex-end;">
                       <p>نام پایه : <?php echo e($class->basics->basic_name); ?></p>
                      </div>

                     </div>
                  </div>
                  <div class=" card-body">
                   <div class="row">
                   <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class=" col-md-2 my-2 text-center">
                     <div class="flex__column">

                      <?php if($student->student_student_photo): ?>
                      <img class="img-thumbnail" src=" <?php echo e(route('BaseUrl')); ?>/uploads/students/<?php echo e($student->student_national_number); ?>/<?php echo e($student->student_student_photo); ?> " height="100" width="100" alt="">

                      <?php else: ?>
                     <img class="img-thumbnail" src=" <?php echo e(route('BaseUrl')); ?>/Pannel/img/avatar.jpg " height="100" width="100" alt="">
                    <?php endif; ?>
                     <span>
                         <?php echo e($student->student_firstname .' _ '. $student->student_lastname); ?>

                     </span>
                     </div>
                 </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>      


<script >
// window.addEventListener('load',function(){

//   window.print()
// })

</script>
</body>
</html>



<?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Students/PDF_Allbum.blade.php ENDPATH**/ ?>