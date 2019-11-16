@extends('Layouts.Pannel.Template')

@section('content')
<div class="container-fluid">

    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ثبت مورد انضباطی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">انضباطی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت مورد انضباطی دانش آموز</a>
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
                        <th>شماره دانش آموزی</th>
                        <th>پایه</th>
                        <th>کلاس</th>
                        <th>ثبت مورد</th>
                        <th>گزارش</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>علی رضایی</td>
                        <td>رضا</td>
                        <td>7856436752</td>
                        <td>هشتم</td>
                        <td>هشت دو</td>
                        <td class="text-center"><a href=""><i style="font-size:22px" class="icon ti-pencil"></a></td>
                        <td class="text-center"><a href=""><i style="font-size:22px" class="icon ti-menu-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>علی رضایی</td>
                        <td>محمد</td>
                        <td>613214211</td>
                        <td>هشتم</td>
                        <td>هشت دو</td>
                        <td class="text-center"><a href=""><i style="font-size:22px" class="icon ti-pencil"></a></td>
                        <td class="text-center"><a href=""><i style="font-size:22px" class="icon ti-menu-alt"></i></a></td>
                    </tr>


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