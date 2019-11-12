<!-- begin::side menu -->
<div class="side-menu">
 <div class="side-menu-body">
     <ul>
         <li class="side-menu-divider">فهرست</li>
         <li><a class="active" href="index.html"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
         {{-- <li><a data-attr="layout-builder-toggle" href="#">
             <i class="icon ti-layout"></i> <span>طرح ها</span> <span class="badge bg-danger-gradient">8+</span></a>
         </li> --}}
         <li><a href="#"><i class="icon ti-user"></i> <span>دانش اموزان</span> </a>
             <ul>
                 <li><a href=" {{route('BaseUrl')}} ">ثبت نام </a></li>
                 <li><a href=" {{route('Student.Excel')}} ">ورود اطلاعت از طریق اکسل </a></li>
                 <li><a href=" {{route('Student.Photo')}} ">اختصاص سریع عکس </a>  </li>
                 <li><a href=" {{route('Student.AlbumPhoto')}} ">آلبوم عکس دانش آموزی </a></li>
                 <li><a href="{{route('Student.EditClass')}}">کلاس بندی</a></li>
             </ul>
         </li>
       </ul>
 </div>
</div>
<!-- end::side menu -->