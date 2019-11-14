<!-- begin::side menu -->
<div class="side-menu">
 <div class="side-menu-body">
     <ul>
         <li class="side-menu-divider">فهرست</li>
         <li><a class="active" href="#"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
         {{-- <li><a data-attr="layout-builder-toggle" href="#">
             <i class="icon ti-layout"></i> <span>طرح ها</span> <span class="badge bg-danger-gradient">8+</span></a>
         </li> --}}
            <li><a href="#"><i class="icon ti-user"></i> <span>دانش اموزان</span> </a>
                <ul>
                    <li><a href="{{route('Student.List')}}">لیست دانش آموزان</a></li>
                    <li><a href=" {{route('Dashboard')}} ">ثبت نام </a></li>
                    <li><a href=" {{route('Student.Excel')}} ">ورود اطلاعت از طریق اکسل </a></li>
                    <li><a href=" {{route('Student.Photo')}} ">اختصاص سریع عکس </a> </li>
                    <li><a href=" {{route('Student.AlbumPhoto')}} ">آلبوم عکس دانش آموزی </a></li>
                    <li><a href="#"> <span>کلاس بندی</span> </a>
                        <ul>
                            <li><a href="{{route('Student.AddSection')}} ">تعریف مقطع</a></li>
                            <li><a href="{{route('Student.AddBasic')}}"> تعریف پایه</a></li>
                            <li><a href=" {{route('Student.AddClass')}} ">تعریف کلاس</a></li>
                            <li><a href="">ویرایش کلاس بندی</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-alert"></i> <span>انضباطی</span> </a>
                <ul>
                    <li><a href="{{route('Discipline.Add')}}">ثبت مورد دانش آموز </a></li>
                    <li><a href="">ثبت مورد دسته جمعی</a></li>
                    <li><a href="">ثبت نمره انضباط</a> </li>
                    <li><a href="">تعریف آیین نامه انضباظی </a></li>
                    <li><a href="">لیست گزارش انضباطی</a></li>
                    <li><a href=""> لیست غیبت و تاخیر </a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end::side menu -->
