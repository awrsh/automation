@extends('Layouts.Pannel.Template');

@section('content')

<div class="container">
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
          <h5 class="card-title"> ثبت نام دانش آموز</h5>
          <p>تعداد دانش آموزان قابل ثبت : 121 نفر</p>
          <div id="wizard2">
          <h5 class="card-title"> ثبت نام دانش اموز</h5>
          <form id="form1" method="post" action=" {{route('Student.Register')}} " enctype="multipart/form-data">
              <div id="wizard2">
              @csrf
              <h3>اطلاعات شخصی</h3>
              <section>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>نام</label>
                          <input type="text" class="form-control" value=" {{old('firstname')}} " name="firstname"  >

                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label>نام خانوادگی</label>
                          <input type="text" class="form-control" value=" {{old('lastname')}} "  name="lastname"  >

                      </div><!-- form-group -->
                      </div>

                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>شماره شناسنامه</label>
                          <input type="text" class="form-control" value=" {{old('certificate_number')}} " name="certificate_number"  >

                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label> کد ملی</label>
                          <input type="text" class="form-control" value=" {{old('national_number')}} "  name="national_number"  >

                      </div><!-- form-group -->
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>نام پدر</label>
                          <input type="text" class="form-control" value=" {{old('father_name')}} " name="father_name"  >

                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label>  موبایل پدر</label>
                          <input type="text" name="father_mobile" id="father_mobile" value="{{old('father_mobile')}}" class="form-control text-right" >

                      </div><!-- form-group -->
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label> موبایل مادر</label>
                          <input type="text" class="form-control" value=" {{old('mother_mobile')}} " id="mother_mobile" name="mother_mobile"  >

                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label> تاریخ تولد</label>
                          <input type="text" id="" name="birthday" value=" {{old('birthday')}}" class="form-control text-right date-picker-shamsi-list" dir="ltr" >

                      </div><!-- form-group -->
                      </div>

              </section>

              <h3>اطلاعات دانش اموزی</h3>
              <section>


                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> مقطع دانش آموز</label>
                    <input type="text" value=" {{old('student_section')}}" name="student_section" class="form-control" >

                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>  پایه دانش آموز</label>
                    <input type="text" value=" {{old('student_basic')}}" name="student_basic" class="form-control text-right" dir="ltr" >

                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> کلاس دانش آموز</label>
                    <input type="text" value=" {{old('student_class')}}" name="student_class" class="form-control" >

                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>  شماره دانش اموزی</label>
                    <input type="text" value=" {{old('student_number')}}" name="student_number" class="form-control text-right" dir="ltr" >

                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> تلفن منزل</label>
                    <input type="text" value=" {{old('home_tel')}}" name="home_tel" class="form-control" >

                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>   موبایل دانش اموز</label>
                    <input type="text" value=" {{old('student_mobile')}}" name="student_mobile" class="form-control text-right" dir="ltr" >

                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> نام مدرسه قبلی</label>
                    <input type="text" value=" {{old('prev_school')}}" name="prev_school" class="form-control" >

                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label> اپلود عکس(3X4) </label>
                    <input type="file" id="target"  name="student_photo" class="form-control-file text-right" dir="rtl" >

                </div><!-- form-group -->
                </div>

              </section>

            </div>

        </form>
  </div>
  </div>
</div>
  </div>
 </div>
</div>



@endsection


@section('css')

    <!-- begin::form wizard -->
    <link rel="stylesheet" href=" {{route('BaseUrl')}}/Pannel/assets/vendors/form-wizard/jquery.steps.css" type="text/css">
   <style>
   input.error{
      background: rgb(255, 255, 255) !important;
    border: 1px solid #ff5368 !important;
    color: #ed1636 !important;
    }
   </style>
    <!-- end::form wizard -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->
@endsection

@section('js')
    <!-- begin::form wizard -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/form-wizard.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/toast.js"></script>
    <!-- end::form wizard -->



<!-- begin::datepicker -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->


@endsection
