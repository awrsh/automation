@extends('layouts.Pannel.Template')
@section('content')
<div class="container-fluid">

    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>پرسنل</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="#">پرسنل</a></li>
                    <li class="breadcrumb-item"><a href="#">لیست پرسنل</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page header -->

    <div class="row">
        <div class="col-md-12">
            <div class="card" id="listpersonalRL">

                <div class="card-body">
                    <div class="table-responsive my-5" tabindex="7" style="overflow: hidden; outline: none;">
                        <table class="table example2 text-center">
                            <thead class="">
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">نام و نام خانوادگی</th>
                                    <th scope="col"> مسئولیت </th>
                                    <th scope="col">تلفن همراه</th>
                                    <th scope="col">نام کاربری</th>
                                    <th scope="col"> کلمه عبور</th>
                                    <th scope="col"> وضعیت</th>
                                    <th scope="col">ویرایش</th>
                                    <th scope="col">حذف</th>
                                </tr>
                            </thead>
                            @php
                            $i =1;
                            $listPersonal =
                            \App\PersonelModel::where('school_id',session()->get('ManagerSis')['id'])->get();


                            @endphp
                            <tbody>
                                @foreach ($listPersonal as $item)
                                @php
                                if ($item->personel_status=='off') {
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
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$item->personel_name}}</td>
                                    <td>{{$item->personel_role}}</td>
                                    <td>{{$item->personel_phone}}</td>
                                    <td>{{$item->personel_username}}</td>
                                    <td>{{$item->personel_password}}</td>
                                    <td class="change-st"><a href="#" class="btn change_status btn-{{$color}}"
                                            data-id="{{$item->personel_id}}"
                                            data-data="{{$data_status}}">{{$status}}</a>
                                    </td>
                                <td><a href="{{route('Personels.EditPersonal')}}/{{$item->personel_id}}" class="btn btn-outline-primary">ویرایش</a>
                                    </td>
                                <td><a href="{{route('Personels.DeletePersonal')}}/{{$item->personel_id}}" class="btn btn-outline-danger">حذف</a></td>
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
<script>
    $(document).ready(function() {
    
$.ajaxSetup({

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".change_status").click(function(e){
    console.log('click');
    //  e.preventDefault();
    var item =$(this);
    var id_personal = $(this).data('id');     
    var status = $(this).data('data'); 
    console.log(status);  
   

    $.ajax({

        type:'POST',
        url:'ChangeStatusPersonal',
        data:{id_personal:id_personal,status:status},
        success:function(data){
               location.reload()
        },
        error:function(data){
         
        }

    });

});

});
</script>

@endsection