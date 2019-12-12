@extends('Layouts.Students.Template');

@section('content')
    <div class="container-fluid">

        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3 style="color: #a4aac1;
            text-shadow: 0 1px 1px black;"> ثبت مطالعات</h3>
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                        <li class="breadcrumb-item"><a href="#">انضباطی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">تعریف الگوی مطالعاتی</a>
                        </li>

                    </ol>
                </nav> --}}
            </div>


        </div>

        <div class="card">
            <div class="card-body">

                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>
                            {{\Session::get('success')}}
                        </p>
                    </div>
                @endif

                @if(\Session::has('Error'))
                    <div class="alert alert-danger">
                        <p>
                            {{\Session::get('Error')}}
                        </p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action=" {{route('Student.WorkSpace.ExerciseDailyInsert')}} " method="post">
                    @csrf
                    <div class="mb-4">
                        <div class=" row">
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>

                                        <th>نام درس</th>
                                        <th>عنوان تکلیف</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($lessons as $key=>$lesson)
                                        @if (\App\ExerciseDaily::where('lesson_id',$lesson->id)->count())
                                            @foreach (\App\ExerciseDaily::where('lesson_id',$lesson->id)->get() as $exercise)
                                                @php
                                                    $rand = rand();
                                                @endphp
                                                <tr>

                                                    <td> {{$lesson->lesson_name}}</td>
                                                    <td>
                                                        {{$exercise->exercise_name}}
                                                    </td>
                                                    <td>
                                                        {{$exercise->exercise_date}}
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" value="{{$exercise->exercise_id}}"
                                                                       name="status[]"
                                                                       class="custom-control-input switch"
                                                                       id="{{$rand}}">
                                                                <label class="custom-control-label"
                                                                       for="{{$rand}}"><span class="text-danger">انجام نشده</span></label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                            @endforeach
                                        @endif
                                    @endforeach


                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12  my-3">

                                <button type="submit" class=" btn btn-primary btn__info"> ثبت اطلاعات</button>
                            </div>
                        </div>

                    </div>
                </form>


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
        $(document).ready(function (e) {


            $('.switch').change(function () {
                if ($(this).is(':checked')) {
                    $(this).next().html('<span class="text-success">انجام شده</span>')
                } else {
                    $(this).next().html('<span class="text-danger">انجام نشده</span>')
                }
            })
        })


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
