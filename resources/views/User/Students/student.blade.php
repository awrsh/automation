@extends('Layouts.Pannel.Template')

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
                    <div class="d-flex" style="justify-content: space-between;">
                            <h5 class="card-title">{{$data->student_firstname}} - {{$data->student_lastname}}</h5>
                            <div class=" col-md-2 my-2 text-center">
                                    <div class="flex__column">
                                        @php
                                            if($data->student_student_photo!=""){
                                            $img = route('BaseUrl').'/uploads/students/pic/'.$data->student_student_photo;
                                            }else{
                                             $img = route('BaseUrl').'/Pannel/img/avatar.jpg';
                                            }
                                        @endphp
                                    <img style="object-fit: scale-down;" src="{{$img}}" height="100" width="75" alt="">
                                    </div>
                            </div>
                    </div>

                <form id="form1" method="post" action="{{route('Student.EditInfo')}}"
                        enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div id="wizard2">
                            @csrf
                        <input type="hidden" name="id_student" value="{{$data->student_id}}">
                            <section>

                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام</label>
                                        <input type="text" class="form-control" value="{{$data->student_firstname}}" id="firstname" name="firstname"
                                            required>

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام خانوادگی</label>
                                        <input type="text" class="form-control" value="{{$data->student_lastname}}" name="lastname" required>

                                    </div><!-- form-group -->
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>شماره شناسنامه</label>
                                        <input type="number" class="form-control" value="{{$data->student_certificate_number}}" id="certificate_number"
                                            name="certificate_number" required>
                                        <p class="errorMassage" id="massage-certificate_number"></p>
                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> کد ملی</label>
                                        <input type="number" class="form-control" value="{{$data->student_national_number}}" id="national_number"
                                            name="national_number" required>
                                        <p class="errorMassage" id="massage-national_number"></p>
                                    </div><!-- form-group -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label>نام پدر</label>
                                        <input type="text" class="form-control" value="{{$data->student_father_name}}" name="father_name" required>

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> موبایل پدر</label>
                                        <input type="text" name="father_mobile" value="{{$data->student_father_mobile}}" id="father_mobile" required
                                            class="form-control text-right">
                                        <p class="errorMassage" id="massage-father_name"></p>
                                    </div><!-- form-group -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> موبایل مادر</label>
                                        <input type="text" class="form-control" value="{{$data->student_mother_mobile}}" id="mother_mobile" required
                                            name="mother_mobile">
                                        <p class="errorMassage" id="massage-mother_mobile"></p>
                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> تاریخ تولد</label>
                                        <input type="text" id="" name="birthday" value="{{$data->student_birthday}}" required
                                            class="form-control text-right date-picker-shamsi-list" dir="ltr">

                                    </div><!-- form-group -->
                                </div>
                            </section>
                            <section>
                                <div class="row">

                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> شماره دانش اموزی</label>
                                        <input type="text" name="student_number" value="{{$data->student_student_number}}" required
                                            class="form-control text-right" dir="ltr">
                                    </div><!-- form-group -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> تلفن منزل</label>
                                        <input type="text" name="home_tel" value="{{$data->student_home_tel}}" required class="form-control">

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> موبایل دانش اموز</label>
                                        <input type="text" name="student_mobile" value="{{$data->student_student_mobile}}" id="student_mobile" required
                                            class="form-control text-right" dir="ltr">
                                            <p class="errorMassage" id="massage-student_mobile"></p>
                                    </div><!-- form-group -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> نام مدرسه قبلی</label>
                                        <input type="text" name="prev_school" value="{{$data->student_prev_school}}" class="form-control" required>

                                    </div><!-- form-group -->
                                    <div class="form-group col-md-6 wd-xs-300">
                                        <label> اپلود عکس(3X4) </label>
                                        <input type="file" id="target" name="student_photo"
                                            class="form-control-file text-right" dir="rtl">
                                    </div><!-- form-group -->
                                </div>

                                <div class="row">
                                    <div class=" form-group col-md-6">
                                        <button type="submit" class="btn subForm btn-primary">ویرایش</button>
                                    </div>
                                </div>
                            </section>

                        </div>
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
    input.error {
        background: rgb(255, 255, 255) !important;
        border: 1px solid #ff5368 !important;
        color: #ed1636 !important;
    }

    .border-top {
        border-top: 1px solid #e5e5e5;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e5e5;
    }

    .border-top-gray {
        border-top-color: #adb5bd;
    }

    .box-shadow {
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
    }

    .lh-condensed {
        line-height: 1.25;
    }

    .errorMassage {
        color: #ed1636;
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
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script> --}}
{{-- <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/form-wizard.js"></script> --}}
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
            $("#student_section").change(function(e){
                e.preventDefault();
                var student_section = $(this).val();
                $.ajax({

                    type:'POST',
                    url:'send_section',
                    data:{student_section:student_section},
                    success:function(data){
                        if (data !== '') {

                            $('#student_basic').html(data)
                        }else{
                            $('#student_basic').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
                        }

                    }

                });

            });



            $("#student_basic").change(function(e){
                e.preventDefault();
                var student_class = $(this).val();
                $.ajax({

                    type:'POST',
                    url:'send_basic',
                    data:{student_class:student_class},
                    success:function(data){
                        console.log(data)
                        if (data !== '<option>انتخاب کنید </option>') {

                            $('#student_class').html(data)
                        }else{
                            $('#student_class').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
                        }

                    }

                });

            });


          $('#certificate_number').on('change',function(e){
            if($(this).val().length>12 || $(this).val().length <4)
            {
                $("#massage-certificate_number").html('شماره شناسنامه وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);

            }else{
                $("#massage-certificate_number").html('');
                $('.subForm').attr("disabled", false);
            }
          });

          $('#national_number').on('change',function(e){
            if($(this).val().length>10 || $(this).val().length <10)
            {
                $("#massage-national_number").html('کد ملی وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);

            }else{
                $("#massage-national_number").html('');
                $('.subForm').attr("disabled", false);
            }
          });



          $('#father_mobile').on('change',function(e){
            if($(this).val().length>11 || $(this).val().length <11)
            {
                $("#massage-father_name").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);

            }else{
                $("#massage-father_name").html('');
                $('.subForm').attr("disabled", false);
            }
          });


          $("#father_mobile").change(function () {
        var VAL = this.value;
        var rgx = /(\+98|0)?9\d{9}/;
        var mobile = new RegExp(rgx);

        if (mobile.test(VAL)) {
            $("#massage-father_name").html('');
                $('.subForm').attr("disabled", false);
        }else{
            $("#massage-father_name").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
        }
    });




    $('#mother_mobile').on('change',function(e){
            if($(this).val().length>11 || $(this).val().length <11)
            {
                $("#massage-mother_mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);

            }else{
                $("#massage-mother_mobile").html('');
                $('.subForm').attr("disabled", false);
            }
          });


          $("#mother_mobile").change(function () {
        var VAL = this.value;
        var rgx = /(\+98|0)?9\d{9}/;
        var mobile = new RegExp(rgx);

        if (mobile.test(VAL)) {
            $("#massage-mother_mobile").html('');
                $('.subForm').attr("disabled", false);
        }else{
            $("#massage-mother_mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
        }
    });



    $('#student_mobile').on('change',function(e){
            if($(this).val().length>11 || $(this).val().length <11)
            {
                $("#massage-student_mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);

            }else{
                $("#massage-student_mobile").html('');
                $('.subForm').attr("disabled", false);
            }
          });


          $("#student_mobile").change(function () {
        var VAL = this.value;
        var rgx = /(\+98|0)?9\d{9}/;
        var mobile = new RegExp(rgx);

        if (mobile.test(VAL)) {
            $("#massage-student_mobile").html('');
                $('.subForm').attr("disabled", false);
        }else{
            $("#massage-student_mobile").html('شماره موبایل وارد شده اشتباه است');
                $('.subForm').attr("disabled", true);
        }
    });

        })();





</script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/toast.js"></script>
<!-- end::form wizard -->



<!-- begin::datepicker -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->


@endsection
