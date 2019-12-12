<!-- begin::side menu -->
<div class="side-menu">
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">فهرست</li>
            <li><a class="active" href="<?php echo e(route('Teachers.WorkSpace.Dashboard')); ?>"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
            
          
       
         <li><a href="#"><i class="icon ti-book"></i> <span>انظباطی</span> </a>
             <ul>
                 <li><a href=" <?php echo e(route('Teachers.WorkSpace.DisciplineList')); ?> ">لیست موارد انظباطی</a></li>
                 <li><a href=" <?php echo e(route('Teachers.WorkSpace.AddDisciplineView')); ?> ">ثبت مورد انظباطی</a></li>

                </ul>
         </li>
    
            <li><a href="#"><i class="icon ti-book"></i> <span>مطالعات</span> </a>
                <ul>
                    <li><a href="<?php echo e(route('Teachers.WorkSpace.AddStudyView')); ?>"> ثبت مطالعه   </a></li>
                    <li><a href=" <?php echo e(route('Teachers.WorkSpace.StudyReportListView')); ?> ">   مشاهده وضعیت مطالعه</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="icon ti-book"></i> <span>فعالیت های کلاسی</span> </a>
                <ul>
                    <li><a href="<?php echo e(route('Teachers.WorkSpace.ClassScores')); ?>"> ثبت نمرات کلاسی</a></li>
                    <li><a href=" <?php echo e(route('Teachers.WorkSpace.AddExerciseDailyView')); ?> ">ثبت تکلیف</a></li>
                    <li><a href=" <?php echo e(route('Teachers.WorkSpace.AddExerciseScoresView')); ?> ">  ثبت نمره تکلیف</a></li>

                    <li><a href=" <?php echo e(route('Teachers.WorkSpace.Status_absence')); ?> ">ثبت حضور غیاب کلاسی</a></li>
                </ul>
            </li>

        


            <li><a href="#"><i class="icon ti-book"></i> <span>تکالیف</span> </a>
                <ul>
                    <li><a href="<?php echo e(route('Student.WorkSpace.ExerciseDailyView')); ?>">  گزارش تکلیف روزانه </a></li>
                    
                </ul>
            </li> 
            <li><a href="<?php echo e(route('Teachers.WorkSpace.LogOut')); ?>"><i class="icon ti-close"></i> <span>خروج</span> </a></li>
        </ul>
    </div>
</div>
<!-- end::side menu -->
<?php /**PATH C:\xampp\htdocs\automation\resources\views/Layouts/Teachers/Pannel/SideBar.blade.php ENDPATH**/ ?>