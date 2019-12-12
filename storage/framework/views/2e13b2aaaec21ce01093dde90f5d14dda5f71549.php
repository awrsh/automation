<!-- begin::side menu -->
<div class="side-menu">
 <div class="side-menu-body">
     <ul>
         <li class="side-menu-divider">فهرست</li>
         <li><a class="active" href="#"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
            <li><a href="#"><i class="icon ti-user"></i> <span>مدارس</span> </a>
                <ul>
                    <li><a href="<?php echo e(route('Admin.SchoolsList')); ?>">لیست مدارس</a></li>
                    <li><a href=" <?php echo e(route('Admin.SchoolAdd')); ?> ">ثبت نام </a></li>
                </ul>
            </li>
  
        </ul>
    </div>
</div>
<!-- end::side menu -->
<?php /**PATH C:\xampp\htdocs\automation\resources\views/Layouts/Admin/SideBar.blade.php ENDPATH**/ ?>