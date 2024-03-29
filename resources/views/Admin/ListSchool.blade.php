@extends('Layouts.Admin.Template')
@section('content')
<div class="container-fluid">

    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست مدارس</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مدارس</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">لیست مدارس</a>
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
                        <th>نام مدرسه</th>
                        <th>نام مدیر</th>
                        <th>تلفن مدیر</th>
                        <th>نام کاربری </th>
                        <th>کلمه عبور</th>
                        <th>URL</th>
                        <th>تعداد دانش آموز</th>
                        <th>آدرس</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody id="content">
                    @php
                    $i=1;
                    $list = \App\Models\School::get();
                    @endphp
                    @foreach ($list as $item)
                    @php
                    $Pass
                    =\App\Models\Admin\PasswordListSchoolModel::where('school_id',$item->school_id)->first()->pass_txt;

                    if($item->school_status =="off"){
                    $status ="غیر فعال";
                    $color ='danger';
                    $data_status='on';
                    }else {
                    $status ='فعال';
                    $color = "success";
                    $data_status='off';
                    }
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->school_name}}</td>
                        <td>{{$item->school_name_manager}}</td>
                        <td>{{$item->school_phone_manager}}</td>
                        <td>{{$item->school_username}}</td>
                        <td>{{$Pass}}</td>
                        <td class="text-left" style="direction: ltr;" title="{{$item->school_url}}">
                            {{\Illuminate\Support\Str::limit($item->school_url,12)}}</td>
                        <td>{{$item->school_count_students}} نفر</td>
                        <td title="{{$item->school_address}}">
                            {{\Illuminate\Support\Str::limit($item->school_address,8)}}</td>
                        <td><a href="#" id="change_status-{{$i}}" class="btn change_status btn-{{$color}}  btn-sm btn-uppercase" 
                        data-data="{{$data_status}}"  data-id="{{$item->school_id}}">{{$status}}</a></td>
                        <td class="text-center"><a href="#"
                                class="btn  btn-sm btn-outline-warning  btn-square btn-uppercase"><i
                                    class="icon ti-pencil"></i>ویرایش</a></td>
                        <td class="text-center"><a href=""
                                class="btn btn-sm btn-outline-danger btn-square btn-uppercase"><i
                                    class="icon ti-trash "></i>حذف</a></td>
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
<script>
    (function () {
            'use strict';
            window.addEventListener('load', function () {
                
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');

                    }, false);
                });
            }, false);

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          

            $(".change_status").click(function(e){
                e.preventDefault();
                var id_school = $(this).data('id');     
                var status = $(this).data('data');   
               
                $.ajax({
                    type:'POST',
                    url:'ChangeStatusSchool',
                    data:{id_school:id_school,status:status},
                    success:function(data){
                     location.reload();
                    },
                    error:function(data){
                     
                    }
                });

            });
        


        })();
</script>

@endsection
@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
@endsection