@extends('Layouts.Pannel.Template');

@section('content')
    <div class="container-fluid">
        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3> نمرات تکالیف </h3>
            </div>
        </div>
        <div class="card">
            <div class=" card-header">
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="profile row">
                    <div class="col-sm-6 p-3 mb-5">
                        <div class="d-flex">
                            <div class=" col-sm-6 col-md-3">
                                @if ($student->student_student_photo )
                                    <img
                                        src=" {{route('BaseUrl')}}/uploads/students/{{$student->student_student_photo}}"
                                        style="width: 100px;" class="img-thumbnail" alt="">
                                @else
                                    <img src="{{route('BaseUrl')}}/Pannel/img/avatar.jpg" style="width: 100px;"
                                         class="img-thumbnail" alt="">
                                @endif
                            </div>
                            <div class="col-md-9 mt-3">
                                <p class=" lead">{{$student->student_firstname .' _ '. $student->student_lastname}}</p>
                                <p class="">کلاس {{$student->getClass->class_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" thead-light">
                        <tr>

                            <th scope="col">ردیف</th>
                            <th scope="col">نام درس</th>
                            <th scope="col">نمره ثبت شده</th>
                            <th scope="col">تاریخ تکلیف</th>
                        </tr>
                        </thead>
                        <tbody>

                         @if (count($student->exercise_scores))
                         @foreach ($student->exercise_scores as $key=>$exercise_scores)
                         <tr>

                           <td >{{$key +1}}</td>
                           <td >{{\App\LessonModel::where('id',$exercise_scores->lesson_id)->first()->lesson_name}}</td>
                           <td>{{$exercise_scores->score}}</td>
                           <td >{{\Morilog\Jalali\Jalalian::forge($exercise_scores->exercise_date)->format('%A, %d %B %y')}}</td>
                         </tr>
                         @endforeach
                         @else
                         <td >موردی برای این دانش اموز وجود ندارد</td>
                         @endif
                        </tbody>
                    </table>
                </div>
                <div id="content">

                </div>
            </div>
        </div>


    </div>
@endsection

@section('js')
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datatable.js"></script>
    <!-- begin::datepicker -->
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
    <!-- end::datepicker -->

    <script>
       

    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
          type="text/css">

    <!-- begin::datepicker -->
    <link rel="stylesheet"
          href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

@endsection
