@extends('Layouts.Teachers.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3 style="color: #a4aac1;
            text-shadow: 0 1px 1px black;"> داشبورد </h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مطالعاتی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">کارنامه دانش اموز</a>
                    </li>

                </ol>
            </nav> --}}
        </div>

    </div>

    <div class="card">

        <div class=" card-header">


            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>
                    {{\Session::get('success')}}
                </p>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class="profile row">
                <div class="col-sm-6 p-3">
                    <div class="d-flex">
                        <div class=" col-sm-6 col-md-3">
                            @if ($teacher->teacher_profile )

                            <img src=" {{route('BaseUrl')}}/uploads/students/{{$teacher->teacher_profile}}"
                                style="width: 100px;" class="img-thumbnail" alt="">
                            @else
                            <img src="{{route('BaseUrl')}}/Pannel/img/avatar.jpg" style="width: 100px;"
                                class="img-thumbnail" alt="">

                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                اطلاعات
                <a href="#" class="btn-sm primary-font" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="ti-pencil m-l-5"></i> ویرایش
                </a>
            </h5>
            <div class="row mb-2">
                <div class="col-3 text-muted">نام و نام خانوادگی: </div>
                <div class="col-9">{{$teacher->teacher_fullname}}</div>
            </div>

            <div class="row mb-2">
                <div class="col-3 text-muted">تلفن:</div>
                <div class="col-9">{{$teacher->teacher_mobile}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">ایمیل:</div>
                <div class="col-9">{{$teacher->teacher_email}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">شهر:</div>
                <div class="col-9">{{$teacher->teacher_birthplace}} </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">آدرس:</div>
                <div class="col-9">{{$teacher->teacher_address}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-3 text-muted">بیوگرافی: </div>
                <div class="col-9">{{$teacher->teacher_biography}}</div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-15">
            <form id="form" action=" {{route('Teachers.WorkSpace.EditProfile',$teacher)}} " method="post">
                @csrf
                @method('PUT')
                <h5 class="text-center mt-2 modal__header" >فرم ویرایش اطلاعات</h5>

                <div class="row my-3">
                    <div class="col-md-6">
                        <label class="text-muted" for="">نام و نام خانوادگی: </label>
                        <input type="text" value="{{  $teacher->teacher_fullname  }} " name="teacher_fullname"
                            class="form-control text-right " dir="ltr">
                    </div>
              
                    <div class="col-md-6">
                        <label class="text-muted" for="">تلفن:  </label>
                        <input type="text" value="{{  $teacher->teacher_mobile  }} " id="teacher_mobile" name="teacher_mobile"
                            class="form-control text-right " dir="ltr" 
                           
                            >
                    </div>
                </div>
                <input type="hidden" value="{{$teacher->id}}" name="teacher_id">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted" for="">ایمیل:</label>
                        <input type="text" value="{{  $teacher->teacher_email  }} " name="teacher_email"
                            class="form-control text-right " dir="ltr">
                    </div>
             
                    <div class="col-md-6">
                        <label class="text-muted" for="">شهر: </label>
                        <input type="text" value="{{  $teacher->teacher_birthplace  }} " name="teacher_birthplace"
                            class="form-control text-right " dir="ltr">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="text-muted" for="">آدرس: </label>
                        <textarea type="text"  name="teacher_address"
                            class="form-control text-right " dir="ltr">{{  $teacher->teacher_address  }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5 class=" mt-2 text-muted"> بیوگرافی: </h5>
                        <textarea type="text" name="teacher_biography" class="form-control text-right "
                            dir="ltr">{{  $teacher->teacher_biography  }} </textarea>
                    </div>
                </div>

           

                <div class="row mb-3">
                    <div class="col-md-12 text-center mt-3">
                        <button type="button" class="btn btn-secondary mx-3" data-dismiss="modal">لغو</button>
                        <button type="submit" class=" btn btn-success">تایید</button>
                    </div>
                </div>




        </div>
        </form>
    </div>
</div>


@endsection

@section('js')

<script>

var teacher_mobile = document.getElementById('teacher_mobile');
teacher_mobile.oninvalid = function(event) {

event.target.setCustomValidity('شماره موبایل باید 11 رقم باشد');

}
</script>
@endsection
@section('css')

@endsection