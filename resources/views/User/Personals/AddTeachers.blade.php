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
                    <li class="breadcrumb-item"><a href="#"> ثبت نام دبیر</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page header -->

    <div class="row">
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
                    <form id="form1" method="post" action=" {{route('Teachers.Register')}} "
                        enctype="multipart/form-data" class="needs-validation" novalidate>

                        <div id="wizard2">
                            @csrf

                            <section>
                                <h6 class="card-title"> اطلاعات کلی</h6>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام نام خانوادگی</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" required>

                                    </div><!-- form-group -->

                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>تحصیلات</label>
                                        <input type="text" class="form-control" name="Education" required>
                                    </div>
                                  
                                
                                </div>
                              <!-- form-group -->
                                <!-- form-group -->
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 wd-xs-300">
                                <label>ایمیل</label>
                                <input type="email" class="form-control" id="username" name="email" required>

                            </div><!-- form-group -->
                            <div class="form-group col-md-6 wd-xs-300">
                                <label>کلمه عبور</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <!-- form-group -->
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 wd-xs-300">
                                <label>کد ملی</label>
                                <input type="number" class="form-control" id="certificate_number"
                                    name="certificate_number" required>
                                <p class="errorMassage" id="massage-certificate_number"></p>
                            </div><!-- form-group -->
                            <div class="form-group col-md-6 wd-xs-300">
                                <label>تلفن همراه</label>
                                <input type="number" class="form-control" id="phone_number" name="phone_number"
                                    required>
                                <p class="errorMassage" id="massage-phone_number">
                                </p>
                            </div><!-- form-group -->

                        </div>

                        <div class="row">

                            <div class="form-group col-md-6 wd-xs-300">
                                <label>تلفن ثابت</label>
                                <input type="number" class="form-control" id="telphone" name="telphone" required>
                                <p class="errorMassage" id="massage-telphone"></p>
                            </div>
                            <div class="form-group col-md-6 wd-xs-300">
                                <label>تاریخ تولد</label>
                                <input type="text" name="date" class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">

                            </div>
                            <div class="form-group col-md-6 wd-xs-300">
                                <label>آدرس منزل</label>
                                <textarea class="form-control" id="Address" name="Address" required>
                                    </textarea>

                            </div>
                         
                        </div>
                        </section>
                        <section>
                            <div class="row">
                                <div class=" form-group col-md-6">
                                    <button type="submit" class="btn subForm btn-primary">ثبت</button>
                                </div>
                            </div>
                        </section>

                </div>
            </div>
            </form>
        </div>
    </div>

</div>


@endsection

@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/select2/css/select2.min.css" type="text/css">
@endsection
@section('js')
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/select2/js/select2.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/select2.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
@endsection