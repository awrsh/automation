


@extends('Layouts.Pannel.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>  لیست دانش اموزان به تفکیک هر کلاس</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">دانش اموزان</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#"> لیست دانش اموزان</a>
                    </li>

                </ol>
            </nav>
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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                            <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">

                                @foreach (\App\Models\ClassModel::all() as $key=>$item)
                                <li class="nav-item">
                                  <a class="nav-link {{$key == 0 ? ' active':''}}" id="pills-{{$item->class_id}}-tab" data-toggle="pill" href="#pills-{{$item->class_id}} " role="tab" aria-controls="pills-{{$item->class_id}}" aria-selected="false">{{$item->class_name}}</a>
                                 </li>
                                @endforeach


                            </ul>


                            <div class="tab-content" id="pills-tabContent2">
                                @foreach (\App\Models\ClassModel::all() as $key=>$item)
                                 <div class="tab-pane fade {{$key == 0 ? 'show active':''}}" id="pills-{{$item->class_id}}" role="tabpanel" aria-labelledby="pills-{{$item->class_id}}-tab">



                                        <table class="table table-striped table-bordered example2">
                                                <thead>
                                                    <tr>
                                                        <th>ردیف</th>
                                                          <th>نام</th>
                                                          <th>کد ملی</th>
                                                          <th>نام خانوادگی</th>
                                                          <th> پایه</th>
                                                          <th>کلاس</th>
                                                          <th>ویرایش</th>
                                                          <th>شماره شناسنامه</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get() as $key=>$students)

                                                    <tr>
                                                        <td>{{$key}}</td>
                                                        @if ($students->student_firstname)
                                                        <td>{{ $students->student_firstname}}</td>
                                                        @else
                                                        <td><a class='btn btn-danger btn-sm' href='{{route('Student.EditStudent')}}/{{$students->student_id}}'>ثبت نام</a></td>
                                                        @endif
                                                        @if ($students->student_lastname)
                                                        <td>{{ $students->student_lastname}}</td>
                                                        @else
                                                        <td><a class='btn btn-danger btn-sm' href='{{route('Student.EditStudent')}}/{{$students->student_id}}'>ثبت نام خانوادگی</a></td>
                                                        @endif
                                                        @if ($students->student_national_number)
                                                        <td>{{ $students->student_national_number}}</td>
                                                        @else
                                                        <td><a class='btn btn-danger btn-sm' href='{{route('Student.EditStudent')}}/{{$students->student_id}}'>ثبت کد ملی</a></td>
                                                        @endif
                                                        @if ($students->student_certificate_number)
                                                        <td>{{ $students->student_certificate_number}}</td>
                                                        @else
                                                        <td><a class='btn btn-danger btn-sm' href='{{route('Student.EditStudent')}}/{{$students->student_id}}'> ثبت شماره شناسنامه</a></td>
                                                        @endif
                                                        @if ($students->student_student_class)
                                                        @php
                                                           $class_ob = \App\Models\ClassModel::where('class_id',$students->student_student_class)->first();
                                                           $class= $class_ob->class_name;
                                                           $basic =\App\Models\BasicModel::where('basic_id',$class_ob->basic_id)->first()->basic_name;
                                                       @endphp
                                                       <td>{{$basic}}</td>
                                                       <td>{{$class}}</td>
                                                       @else
                                                       <td><a class='btn btn-danger btn-sm' href='{{route('Student.EditStudent')}}/{{$students->student_id}}'>تعیین پایه</a></td>
                                                       <td><a class='btn btn-danger btn-sm' href='{{route('Student.EditStudent')}}/{{$students->student_id}}'>تعیین کلاس</a></td>
                                                        @endif
                                                        <td class="text-center"><a class='btn btn-outline-primary ' href='{{route('Student.EditStudent')}}/{{$students->student_id}}'> <i class="icon ti-pencil"></i>&nbsp;  ویرایش  </a> </td>
                                                    </tr>

                                                    @endforeach



                                                </tbody>

                                            </table>

                                </div>
                                @endforeach
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
        $(document).ready(function(e){

    $('.bd-example-modal-lg').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
     $('#form').find('input[name=student_id]').val(id)
    })


    $('.bd-modal-lg').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      $.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$.ajax({

type:'get',
url:'discipline/student_chart',
data:{id:id},
success:function(data){
    if (data.length == 110) {
        $('#chart').html('<h4>موردی برای نمایش وجود ندارد</h4>')
    }else{

   $('#chart').html(data)
    }

}

        })

        })


        })
        </script>
@endsection
@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

@endsection



{{--
<div class="tab-content" id="pills-tabContent2">
    @foreach (\App\Models\ClassModel::all() as $key=>$item)
    <div class="tab-pane fade {{$key == 0 ? 'show active':''}}" id="pills-{{$item->class_id}}" role="tabpanel" aria-labelledby="pills-{{$item->class_id}}-tab">
            <table class="table table-striped table-bordered example2">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>کد ملی</th>
                            <th>شماره شناسنامه</th>
                            <th> پایه</th>
                            <th>کلاس</th>
                            <td>ویرایش</td>

                        </tr>
                    </thead>
                    <tbody>



                    </tbody>

                </table>

    </div>
    @endforeach
</div> --}}
