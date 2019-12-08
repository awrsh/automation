@extends('Layouts.Pannel.Template')
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
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page header -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">پرسنل</h5>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                    href="#v-pills-addperosnel" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">ثبت پرسنل</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                    href="#v-pills-listpersonel" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">لیست پرسنل</a>
                                <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-addtechers"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">ثبت دبیر</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                    href="#v-pills-listtechers" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">لیست دبیران</a>


                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                    href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                    aria-selected="false">پیام ها</a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-addperosnel" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class=" col-md-12">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>


                                        @endif

                                        @if (\Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <p>{{ \Session::get('success') }}</p>
                                        </div><br />
                                        @endif
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"> ثبت نام پرسنل</h5>
                                                <form id="form1" method="post"
                                                    action=" {{route('Personels.Register')}} "
                                                    enctype="multipart/form-data" class="needs-validation" novalidate>

                                                    <div id="wizard2">
                                                        @csrf

                                                        <section>
                                                            <h6 class="card-title"> اطلاعات کلی</h6>
                                                            <div class="row">
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>نام نام خانوادگی</label>
                                                                    <input type="text" class="form-control"
                                                                        id="fullname" name="fullname" required>

                                                                </div><!-- form-group -->
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>تحصیلات</label>
                                                                    <input type="text" class="form-control"
                                                                        name="Education" required>
                                                                </div>
                                                                <!-- form-group -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>نام کاربری</label>
                                                                    <input type="text" class="form-control"
                                                                        id="username" name="username" required>

                                                                </div><!-- form-group -->
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>کلمه عبور</label>
                                                                    <input type="password" class="form-control"
                                                                        name="password" required>
                                                                </div>
                                                                <!-- form-group -->
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>کد ملی</label>
                                                                    <input type="number" class="form-control"
                                                                        id="certificate_number"
                                                                        name="certificate_number" required>
                                                                    <p class="errorMassage"
                                                                        id="massage-certificate_number"></p>
                                                                </div><!-- form-group -->
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>تلفن همراه</label>
                                                                    <input type="number" class="form-control"
                                                                        id="phone_number" name="phone_number" required>
                                                                    <p class="errorMassage" id="massage-phone_number">
                                                                    </p>
                                                                </div><!-- form-group -->

                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>تلفن ثابت</label>
                                                                    <input type="number" class="form-control"
                                                                        id="telphone" name="telphone" required>
                                                                    <p class="errorMassage" id="massage-telphone"></p>
                                                                </div>

                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>آدرس منزل</label>
                                                                    <textarea class="form-control" id="Address"
                                                                        name="Address" required>
                                                                    </textarea>

                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <h6 class="card-title"> مسئولیت و دسترسی</h6>

                                                            <div class="row">
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>مسئولیت</label>
                                                                    <input type="text" class="form-control"
                                                                        name="responsibility" required>

                                                                </div>
                                                            </div>
                                                            <p class="card-title">دسترسی ها</p>
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            value="sutdentSubmit"
                                                                            class="custom-control-input"
                                                                            id="customCheck1">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck1">ثبت و لیست دانش
                                                                            آموز</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="importExel"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck2">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck2"> ورود اطلاعت از طریق اکسل
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="photoFast"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck3">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck3">اختصاص سریع عکس</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]"
                                                                            value="AlbumStudents" type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customCheck4">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck4"> آلبوم عکس دانش آموزی
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class=" row">
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="ClassEdit"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck5">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck5">کلاس بندی </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="desciplines"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck6">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck6">انظباتی</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="sms"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck7">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck7"> پیامک </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="reportCard"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck8">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck8"> تعریف کارنامه </label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class=" row mb-4">


                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="exercises"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck12">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck12"> ثبت تکلیف </label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="reports"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck13">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck13"> گزارشات </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]"
                                                                            value="classActivity" type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customCheck14">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck14">فعالیت های کلاسی
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]" value="studis"
                                                                            type="checkbox" class="custom-control-input"
                                                                            id="customCheck15">
                                                                        <label class="custom-control-label"
                                                                            for="customCheck15">مطالعات </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class=" form-group col-md-6">
                                                                    <button type="submit"
                                                                        class="btn subForm btn-primary">ثبت</button>
                                                                </div>
                                                            </div>
                                                        </section>

                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-listpersonel" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="card" id="listpersonalRL">

                                        <div class="card-body">
                                            <div class="table-responsive my-5" tabindex="7"
                                                style="overflow: hidden; outline: none;">
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
                                                            <td class="change-st"><a href="#"
                                                                    class="btn change_status btn-{{$color}}"
                                                                    data-id="{{$item->personel_id}}"
                                                                    data-data="{{$data_status}}">{{$status}}</a>
                                                            </td>
                                                            <td><a href="" class="btn btn-outline-primary">ویرایش</a>
                                                            </td>
                                                            <td><a href="" class="btn btn-outline-danger">حذف</a></td>
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
                                <div class="tab-pane fade" id="v-pills-addtechers" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class=" col-md-12">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>


                                        @endif

                                        @if (\Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <p>{{ \Session::get('success') }}</p>
                                        </div><br />
                                        @endif
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"> ثبت نام دبیر</h5>
                                                <form id="form1" method="post"
                                                    action=" {{route('Personels.Register')}} "
                                                    enctype="multipart/form-data" class="needs-validation" novalidate>

                                                    <div id="wizard2">
                                                        @csrf

                                                        <section>
                                                            <h6 class="card-title"> اطلاعات کلی</h6>
                                                            <div class="row">
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>نام نام خانوادگی</label>
                                                                    <input type="text" class="form-control"
                                                                        id="fullname" name="fullname" required>

                                                                </div><!-- form-group -->
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>تحصیلات</label>
                                                                    <input type="text" class="form-control"
                                                                        name="Education" required>
                                                                </div>
                                                                <!-- form-group -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>نام کاربری</label>
                                                                    <input type="text" class="form-control"
                                                                        id="username" name="username" required>

                                                                </div><!-- form-group -->
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>کلمه عبور</label>
                                                                    <input type="password" class="form-control"
                                                                        name="password" required>
                                                                </div>
                                                                <!-- form-group -->
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>کد ملی</label>
                                                                    <input type="number" class="form-control"
                                                                        id="certificate_number"
                                                                        name="certificate_number" required>
                                                                    <p class="errorMassage"
                                                                        id="massage-certificate_number"></p>
                                                                </div><!-- form-group -->
                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>تلفن همراه</label>
                                                                    <input type="number" class="form-control"
                                                                        id="phone_number" name="phone_number" required>
                                                                    <p class="errorMassage" id="massage-phone_number">
                                                                    </p>
                                                                </div><!-- form-group -->

                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>تلفن ثابت</label>
                                                                    <input type="number" class="form-control"
                                                                        id="telphone" name="telphone" required>
                                                                    <p class="errorMassage" id="massage-telphone"></p>
                                                                </div>

                                                                <div class="form-group col-md-6 wd-xs-300">
                                                                    <label>آدرس منزل</label>
                                                                    <textarea class="form-control" id="Address"
                                                                        name="Address" required>
                                                                    </textarea>

                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <div class="row">
                                                                <div class=" form-group col-md-6">
                                                                    <button type="submit"
                                                                        class="btn subForm btn-primary">ثبت</button>
                                                                </div>
                                                            </div>
                                                        </section>

                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-listtechers" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab"></div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab"></div>

                            </div>
                        </div>
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