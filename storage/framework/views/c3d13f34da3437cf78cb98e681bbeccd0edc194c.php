<!-- begin::side menu -->
<div class="side-menu">
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">فهرست</li>
            <li><a class="active" href="<?php echo e(route('Student.WorkSpace.Dashboard')); ?>"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
            
          
       
         <li><a href="#"><i class="icon ti-book"></i> <span>انظباطی</span> </a>
             <ul>
                 <li><a href=" <?php echo e(route('Student.WorkSpace.DisciplineReport')); ?> ">لیست موارد انظباطی</a></li>
             </ul>
         </li>
    
            <li><a href="#"><i class="icon ti-book"></i> <span>مطالعات</span> </a>
                <ul>
                    <li><a href="<?php echo e(route('Student.WorkSpace.StudyingReport')); ?>"> ثبت مطالعه   </a></li>
                    <li><a href=" <?php echo e(route('Student.WorkSpace.StudyingReportList')); ?> ">   مشاهده وضعیت مطالعه</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="icon ti-book"></i> <span>فعالیت های کلاسی</span> </a>
                <ul>
                    <li><a href="<?php echo e(route('Studing.StudyingModels')); ?>"> </a></li>
                    <li><a href=" <?php echo e(route('Studing.StudyingReport')); ?> ">وضعیت مطالعه دانش اموزان</a></li>
                    <li><a href=" <?php echo e(route('Studing.StudyingLessonsReport')); ?> ">  میانگین مطالعه کلاس ها به تفکیک دروس</a></li>

                    <li><a href=" <?php echo e(route('Studing.StudyingReportList')); ?> ">کارنامه مطالعاتی دروس دانش اموز</a></li>
                </ul>
            </li>

        


            <li><a href="#"><i class="icon ti-book"></i> <span>تکالیف</span> </a>
                <ul>
                    <li><a href="<?php echo e(route('Student.WorkSpace.ExerciseDailyView')); ?>">  گزارش تکلیف روزانه </a></li>
                    
                </ul>
            </li> 
            <li><a href="<?php echo e(route('Student.WorkSpace.LogOut')); ?>"><i class="icon ti-close"></i> <span>خروج</span> </a></li>
        </ul>
    </div>
</div>
<!-- end::side menu -->
<?php /**PATH C:\xampp\htdocs\automation\resources\views/Layouts/Students/Pannel/SideBar.blade.php ENDPATH**/ ?>