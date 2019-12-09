<!-- begin::side menu -->
<div class="side-menu">
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">فهرست</li>
            <li><a class="active" href="{{route('Teachers.WorkSpace.Dashboard')}}"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
            {{-- <li><a data-attr="layout-builder-toggle" href="#">
             <i class="icon ti-layout"></i> <span>طرح ها</span> <span class="badge bg-danger-gradient">8+</span></a>
         </li> --}}
          
       
         <li><a href="#"><i class="icon ti-book"></i> <span>انظباطی</span> </a>
             <ul>
                 <li><a href=" {{route('Teachers.WorkSpace.DisciplineList')}} ">لیست موارد انظباطی</a></li>
                 <li><a href=" {{route('Teachers.WorkSpace.AddDisciplineView')}} ">ثبت مورد انظباطی</a></li>

                </ul>
         </li>
    
            <li><a href="#"><i class="icon ti-book"></i> <span>مطالعات</span> </a>
                <ul>
                    <li><a href="{{route('Teachers.WorkSpace.AddStudyView')}}"> ثبت مطالعه   </a></li>
                    <li><a href=" {{route('Teachers.WorkSpace.StudyReportListView')}} ">   مشاهده وضعیت مطالعه</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="icon ti-book"></i> <span>فعالیت های کلاسی</span> </a>
                <ul>
                    <li><a href="{{route('Teachers.WorkSpace.ClassScores')}}"> ثبت نمرات کلاسی</a></li>
                    <li><a href=" {{route('Teachers.WorkSpace.AddExerciseDailyView')}} ">ثبت تکلیف</a></li>
                    <li><a href=" {{route('Teachers.WorkSpace.AddExerciseScoresView')}} ">  ثبت نمره تکلیف</a></li>

                    <li><a href=" {{route('Studing.StudyingReportList')}} ">کارنامه مطالعاتی دروس دانش اموز</a></li>
                </ul>
            </li>

        {{-- <li><a href="{{ route('Student.WorkSpace.EditProfileView') }}"><i class="icon ti-book"></i> <span>  ویرایش پروفایل</span> </a> --}}


            <li><a href="#"><i class="icon ti-book"></i> <span>تکالیف</span> </a>
                <ul>
                    <li><a href="{{route('Student.WorkSpace.ExerciseDailyView')}}">  گزارش تکلیف روزانه </a></li>
                    {{-- <li><a href=" {{route('Studing.StudyingReport')}} ">وضعیت مطالعه دانش اموزان</a></li>
                    <li><a href=" {{route('Studing.StudyingLessonsReport')}} ">  میانگین مطالعه کلاس ها به تفکیک دروس</a></li>
                    <li><a href=" {{route('Studing.StudyingReportList')}} ">کارنامه مطالعاتی دروس دانش اموز</a></li> --}}
                </ul>
            </li> 
            <li><a href="{{route('Teachers.WorkSpace.LogOut')}}"><i class="icon ti-close"></i> <span>خروج</span> </a></li>
        </ul>
    </div>
</div>
<!-- end::side menu -->
