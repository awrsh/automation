@extends('Layouts.Pannel.Template');

@section('content')
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
    <div class="card">
      <div class="card-body">
          <h5 class="card-title"> ثبت نام دانش آموز</h5>
          <p>تعداد دانش آموزان قابل ثبت : 121 نفر</p>
          <div id="wizard2">
              <h3>اطلاعات شخصی</h3>
              <section>
                  <form id="form1" method="post" action="#">
                   
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>نام</label>
                          <input type="text" class="form-control" id="name" required >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label>نام خانوادگی</label>
                          <input type="text" class="form-control" id="family" required   >
                         
                      </div><!-- form-group -->
                      </div>

                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>شماره شناسنامه</label>
                          <input type="number" class="form-control" id="code1" required >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label> کد ملی</label>
                          <input type="number" class="form-control" id="codenational" required   >
                         
                      </div><!-- form-group -->
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label>نام پدر</label>
                          <input type="text" class="form-control" id="nameFather" required >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label>  موبایل پدر</label>
                          <input type="text" name="number" class="form-control " id="phoneFather" required>
                          
                      </div><!-- form-group -->
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 wd-xs-300">
                          <label> موبایل مادر</label>
                          <input type="text" class="form-control" id="phoneMother" required >
                          
                      </div><!-- form-group -->
                      <div class="form-group col-md-6 wd-xs-300">
                          <label> تاریخ تولد</label>
                          <input type="text" name="date-picker-shamsi-list" id="date_b" class="form-control text-right" dir="ltr" required >
                          
                      </div><!-- form-group -->
                      </div>
                  </form>
              </section>

              <h3>اطلاعات دانش اموزی</h3>
              <section>
                <form id="form2" method="post" action=" {{route('Student.Register')}} ">
                  @csrf
                  <input type="hidden" id="name_h">
                  <input type="hidden" id="family_h">
                  <input type="hidden" id="code1_h">
                  <input type="hidden" id="codenational_h">
                  <input type="hidden" id="nameFather_h">
                  <input type="hidden" id="phoneFather_h">
                  <input type="hidden" id="phoneMother_h">
                  <input type="hidden" id="date_b_h">
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> مقطع دانش آموز</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>  پایه دانش آموز</label>
                    <input type="text" name="" class="form-control text-right" dir="ltr" required>
                    
                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> کلاس دانش آموز</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>  شماره دانش اموزی</label>
                    <input type="text" name="" class="form-control text-right" dir="ltr" required>
                    
                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> تلفن منزل</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label>   موبایل دانش اموز</label>
                    <input type="text" name="" class="form-control text-right" dir="ltr" required>
                    
                </div><!-- form-group -->
                </div>
                <div class="row">
                  <div class="form-group col-md-6 wd-xs-300">
                    <label> نام مدرسه قبلی</label>
                    <input type="text" class="form-control" required>
                    
                </div><!-- form-group -->
                <div class="form-group col-md-6 wd-xs-300">
                    <label> اپلود عکس(3X4) </label>
                    <input type="file" name="" class="form-control-file text-right" dir="rtl" required>
                    
                </div><!-- form-group -->
                </div>
                  </form>
              </section>
              
          </div>
      </div>
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
    <!-- end::form wizard -->
    
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->
@endsection

@section('js')
    <!-- begin::form wizard -->
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/form-wizard/jquery.steps.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/form-wizard.js"></script>
    <!-- end::form wizard -->

    
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/toast.js"></script>

<!-- begin::datepicker -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->
@endsection