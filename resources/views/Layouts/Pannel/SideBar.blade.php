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
                            {{-- <li><a href="{{route('Student.AddSection')}} ">تعریف مقطع</a>
                    </li>
                    <li><a href="{{route('Student.AddBasic')}}"> تعریف پایه</a></li> --}}
                    <li><a href=" {{route('Student.AddClass')}} ">تعریف کلاس</a></li>
                    <li><a href=" {{route('Student.EditClass')}} ">ویرایش کلاس بندی</a></li>
                </ul>
            </li>

        </ul>
        </li>
        <li><a href="#"><i class="icon ti-alert"></i> <span>انظباطی</span> </a>
            <ul>
                <li><a href="{{route('Discipline.Add')}}">ثبت مورد دانش آموز </a></li>
                <li><a href=" {{route('Discipline.AddCases')}} ">ثبت مورد دسته جمعی</a></li>
                <li><a href="{{route('Discipline.AddPoints')}} ">ثبت نمره انظباط</a> </li>
                <li><a href=" {{route('Discipline.defineLow')}} ">تعریف آیین نامه انظباطی </a></li>
                <li><a href="{{route('Discipline.lists')}}">لیست گزارش انظباطی</a></li>
                <li><a href=" {{route('Discipline.AbsenceAndDelayList')}} "> لیست غیبت و تاخیر </a></li>
            </ul>
        </li>
            <li><a href="#"><i class="icon ti-book"></i> <span>مطالعات</span> </a>
                <ul>
                    <li><a href="{{route('Studing.StudyingModels')}}">تعریف الگوی مطالعه </a></li>
                    <li><a href=" {{route('Studing.StudyingReport')}} ">وضعیت مطالعه دانش اموزان</a></li>
                    <li><a href=" {{route('Studing.StudyingLessonsReport')}} ">  میانگین مطالعه کلاس ها به تفکیک دروس</a></li>

                    <li><a href=" {{route('Studing.StudyingReportList')}} ">کارنامه مطالعاتی دروس دانش اموز</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-pencil-alt"></i> <span>فعالیت های کلاسی</span> </a>
                <ul>
                    <li><a href="{{route('activity_class.classScore')}}"> نمرات کلاسی</a></li>
                    <li><a href=" {{route('activity_class.ExerciseAdddaily')}} ">ثبت تکلیف</a></li>
                    <li><a href=" {{route('activity_class.ScoreExercise')}} ">ثبت نمرات تکلیف</a></li>
                    <li><a href=" {{route('activity_class.Status_absence')}} ">ثبت حضور و غیاب</a></li>
                    <li><a href=" {{route('activity_class.exitClass')}} ">ثبت اخراج از کلاس</a></li>
                    <li><a href=" {{route('activity_class.Reporting')}} ">گزارش گیری وضعیت هر دانش آموز </a></li>
                      </ul>
            </li>
            <li><a href="#"><i class="icon ti-layout"></i> <span> کارنامه</span> </a>
                <ul>
                    <li><a href="{{route('ReportCard.Add')}}">  ثبت کارنامه </a></li>
                    <li><a href=" {{route('ReportCard.InsertScore')}} ">وارد کردن نمرات کارنامه</a></li>
                    <li><a href=" {{route('ReportCard.ClassesReportCardView')}} ">  مشاهده کارنامه</a></li>
                    <li><a href=" {{route('Studing.StudyingReportList')}} ">کارنامه مطالعاتی دروس دانش اموز</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-bar-chart"></i> <span> گزارشات</span> </a>
                <ul>
                    <li><a href="{{route('Reports.ClassAvg')}}">  مقایسه کلاس ها به تفکیک هر درس </a></li>
                    <li><a href=" {{route('Studing.StudyingReport')}} ">وضعیت مطالعه دانش اموزان</a></li>
                    <li><a href=" {{route('Studing.StudyingLessonsReport')}} ">  میانگین مطالعه کلاس ها به تفکیک دروس</a></li>
                    <li><a href=" {{route('Studing.StudyingReportList')}} ">کارنامه مطالعاتی دروس دانش اموز</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="icon ti-id-badge"></i> <span>پرسنل</span> </a>
                <ul>
                    <li><a href="{{route('Personels.Personels')}}"> ثبت نام پرسنل</a></li>
                    <li><a href=" {{route('Personels.ListPersonals')}}">لیست پرسنل</a></li>
                    <li><a href=" {{route('Personels.Teachers')}} ">ثبت نام دبیران</a></li>
                    <li><a href=" {{route('Personels.ListTeachers')}}">لیست دبیران</a></li>
                </ul>

            </li>

            <li><a href="{{route('logout.manager')}}"><i class="icon ti-close"></i> <span>خروج</span> </a></li>
        </ul>
    </div>
</div>
<!-- end::side menu -->
