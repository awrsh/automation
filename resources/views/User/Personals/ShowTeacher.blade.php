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
                    <li class="breadcrumb-item"><a href="#"> دبیر</a></li>
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
                    <form action="{{route('Teachers.EditTeacher')}}" method="post">
                        @csrf
                        <input type="hidden" name="EditId" value="{{$data['id']}}"
                        <section>
                            <h6 class="card-title"> اطلاعات کلی</h6>
                            <div class="row">
                                <div class="form-group col-md-6 wd-xs-300">
                                    <label>نام نام خانوادگی</label>
                                    <input type="text" class="form-control" id="fullname"  value="{{$data['teacher_fullname']}}" name="fullname" required>

                                </div><!-- form-group -->

                                <div class="form-group col-md-6 wd-xs-300">
                                    <label>تحصیلات</label>
                                    <input type="text" class="form-control" value="{{$data['teacher_Education']}}" name="Education" required>
                                </div>


                            </div>
                            <!-- form-group -->
                            <!-- form-group -->
                
                <div class="row">
                    <div class="form-group col-md-6 wd-xs-300">
                        <label>ایمیل</label>
                        <input type="email" class="form-control" id="username" value="{{$data['teacher_email']}}" name="email" required>

                    </div><!-- form-group -->
                    <div class="form-group col-md-6 wd-xs-300">
                        <label>کلمه عبور</label>
                        <input type="password" class="form-control" value="{{$data['']}}" name="password" required>
                    </div>
                    <!-- form-group -->
                </div>

                <div class="row">
                    <div class="form-group col-md-6 wd-xs-300">
                        <label>کد ملی</label>
                        <input type="number" class="form-control" id="certificate_number" value="{{$data['teacher_certificate_code']}}" name="certificate_number"
                            required>
                        <p class="errorMassage" id="massage-certificate_number"></p>
                    </div><!-- form-group -->
                    <div class="form-group col-md-6 wd-xs-300">
                        <label>تلفن همراه</label>
                        <input type="number" class="form-control" id="phone_number" value="{{$data['teacher_mobile']}}" name="phone_number" required>
                        <p class="errorMassage" id="massage-phone_number">
                        </p>
                    </div><!-- form-group -->

                </div>

                <div class="row">

                    <div class="form-group col-md-6 wd-xs-300">
                        <label>تلفن ثابت</label>
                        <input type="number" class="form-control" id="telphone" value="{{$data['teacher_tel']}}" name="telphone" required>
                        <p class="errorMassage" id="massage-telphone"></p>
                    </div>
                    <div class="form-group col-md-6 wd-xs-300">
                        <label>تاریخ تولد</label>
                        <input type="text" value="{{$data['teacher_birthday']}}" name="date" class="form-control text-right date-picker-shamsi-list" dir="ltr"
                            autocomplete="off">

                    </div>
                    <div class="form-group col-md-6 wd-xs-300">
                        <label>آدرس منزل</label>
                        <textarea class="form-control" id="Address" name="Address" required>
                                {{$data['teacher_address']}}   </textarea>

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
                </form>

                <h5>ثبت درس </h5>
                <form action="{{route('Teachers.RegisterStop2')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['id']}}">
                    <div class="row">


                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class=" custom-select  mb-3">
                                <option value="  ">انتخاب مورد</option>
                                @php
                                $sis = session()->get('ManagerSis')['sections'];
                                if ($sis==4) {
                                $basics = \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                                }else{
                                $basics = \App\Models\BasicModel::where('section_id', $sis )->get();
                                }
                                @endphp
                                @foreach ($basics as $item)
                                <option value="{{$item->basic_id}}" @if ( old('basic')==$item->basic_id )
                                    selected=""
                                    @endif>{{$item->basic_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> کلاس </label>
                            <select id="class" name="class" class=" custom-select  mb-3">
                            </select>
                        </div>

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> درس </label>
                            <select id="lesson" name="lesson" class=" custom-select  mb-3">
                                <option value="">انتخاب مورد</option>

                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn mb-5 btn-primary">ثبت</button>
                </form>
                <h5>لیست دروس ثبت شده</h5>
                @php
                $list = \App\Models\TeacherLessons::where('teacher_id',$data['id'])->get();
                $i=1;
                @endphp
                <div class="table-responsive">
                    <table class="table table-striped table-bordered  ">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>کلاس </th>
                                <th>درس</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($list as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->class_name}}</td>
                                <td>{{$item->lesson_name}}</td>
                            <td><a href="{{route('Personels.DeleteTeacherLesson')}}/{{$item->id}}">حذف</a></td>
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