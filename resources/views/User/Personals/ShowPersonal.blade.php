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
        <div class=" col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>ویرایش</h5>
                    <form action="{{route('Personels.SEditPersonal')}}" method="post">
                        @csrf
                        <input type="hidden" name="EditId" value="{{$data['personel_id']}}"
                        <section>
                                <h6 class="card-title"> اطلاعات کلی</h6>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام نام خانوادگی</label>
                                        <input type="text" class="form-control"
                                            id="fullname" value="{{$data['personel_name']}}" name="fullname" required>

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>تحصیلات</label>
                                        <input type="text" class="form-control"
                                            value="{{$data['personel_education']}}" name="Education" required>
                                    </div>
                                    <!-- form-group -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام کاربری</label>
                                        <input type="text" class="form-control"
                                            id="username" value="{{$data['personel_username']}}" name="username" required>

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>کلمه عبور</label>
                                        <input type="password" class="form-control"
                                            value="{{$data['personel_password']}}" name="password" required>
                                    </div>
                                    <!-- form-group -->
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>کد ملی</label>
                                        <input type="number" class="form-control"
                                            id="certificate_number"
                                            value="{{$data['personel_codenational']}}" name="certificate_number" required>
                                        <p class="errorMassage"
                                            id="massage-certificate_number"></p>
                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>تلفن همراه</label>
                                        <input type="number" class="form-control"
                                            id="phone_number" value="{{$data['personel_phone']}}" name="phone_number" required>
                                        <p class="errorMassage" id="massage-phone_number">
                                        </p>
                                    </div><!-- form-group -->

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>تلفن ثابت</label>
                                        <input type="number" class="form-control"
                                            id="telphone" value="{{$data['personel_tel']}}" name="telphone" required>
                                        <p class="errorMassage" id="massage-telphone"></p>
                                    </div>

                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>آدرس منزل</label>
                                        <textarea class="form-control" id="Address"
                                             name="Address" required>
                                             {{$data['personel_address']}}
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
                                            value="{{$data['personel_role']}}" name="responsibility" required>

                                    </div>
                                </div>
                                <p class="card-title">دسترسی ها</p>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permissions[]"
                                                value="sutdentSubmit"
                                                class="custom-control-input"
                                                id="customCheck1"
                                                @if (in_array('sutdentSubmit',$data['personel_permissions']))
                                             checked  
                                            @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck1">ثبت و لیست دانش
                                                آموز</label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                         
                                            <input name="permissions[]"  value="importExel" @if (in_array('importExel',$data['personel_permissions']))
                                             checked  
                                            @endif
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
                                                id="customCheck3"
                                                @if (in_array('photoFast',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck3">اختصاص سریع عکس</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]"
                                                value="AlbumStudents" type="checkbox"
                                                class="custom-control-input"
                                                id="customCheck4"
                                                @if (in_array('AlbumStudents',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
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
                                                id="customCheck5"
                                                @if (in_array('AlbumStudents',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck5">کلاس بندی </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]" value="desciplines"
                                                type="checkbox" class="custom-control-input"
                                                id="customCheck6"
                                                @if (in_array('desciplines',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck6">انظباتی</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]" value="sms"
                                                type="checkbox" class="custom-control-input"
                                                id="customCheck7"
                                                @if (in_array('sms',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck7"> پیامک </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]" value="reportCard"
                                                type="checkbox" class="custom-control-input"
                                                id="customCheck8"
                                                @if (in_array('reportCard',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
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
                                                id="customCheck12"
                                                @if (in_array('exercises',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck12"> ثبت تکلیف </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]" value="reports"
                                                type="checkbox" class="custom-control-input"
                                                id="customCheck13"
                                                @if (in_array('reports',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck13"> گزارشات </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]"
                                                value="classActivity" type="checkbox"
                                                class="custom-control-input"
                                                id="customCheck14"
                                                @if (in_array('classActivity',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
                                            <label class="custom-control-label"
                                                for="customCheck14">فعالیت های کلاسی
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]" value="studis"
                                                type="checkbox" class="custom-control-input"
                                                id="customCheck15"
                                                @if (in_array('studis',$data['personel_permissions']))
                                                checked  
                                               @endif
                                                >
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

                </form>
               
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
@endsection
@section('js')
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
<script>
        $(document).ready(function (e) {
    
                $.ajaxSetup({
    
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $("#basic").change(function (e) {
    
                    e.preventDefault();
    
                    var basic_id = $(this).val();
    
                    $.ajax({
    
                        type: 'POST',
                        url: '../Studing/getStudyClasses',
                        data: {basic_id: basic_id,},
                        success: function (data) {
    
                            if (data !== '') {
    
                                $('#class').html(data[0])
    
                            }
                        }
    
                    });
    
                });
    
    
                $("#basic").change(function (e) {
    
                    e.preventDefault();
    
                    var basic_id = $(this).val();
    
                    $.ajax({
    
                        type: 'POST',
                        url: '../ActivityClass/getlessens',
                        data: {basic_id: basic_id,},
                        success: function (data) {
    
                            if (data !== '') {
    
                                $('#lesson').html(data)
    
                            }
                        }
    
                    });
    
                });
    
            
            })
    
    
    </script>
@endsection