@extends('Layouts.Pannel.Template');

@section('content')
<div class="container-fluid">

    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست دانش آموزان</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">دانش آموزان</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">لیست دانش آموزان</a>
                    </li>

                </ol>
            </nav>
        </div>
    </div>


    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام - نام خانوادگی</th>
                        <th>نام پدر</th>
                        <th>کد ملی</th>
                        <th>شماره شناسنامه</th>
                        <th>پایه</th>
                        <th>کلاس</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($list as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->student_firstname}}</td>
                        <td>{{$item->student_lastname}}</td>
                        <td>{{$item->student_national_number}}</td>
                        <td>{{$item->student_certificate_number}}</td>
                        <td>{{$item->student_student_basic}}</td>
                        <td>{{$item->student_student_class}}</td>
                    <td class="text-center"><a href="{{route('Student.EditStudent')}}/{{$item->student_id}}"><i style="font-size:22px" class="icon ti-pencil"></a></td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection

@section('js')
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datatable.js"></script>
@endsection
@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
@endsection