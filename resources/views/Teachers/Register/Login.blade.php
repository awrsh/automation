@extends('Layouts.FrontEnd.Template')
@section('content')
<div class="container h-100-vh">
    <div class="row align-items-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block p-t-b-25">
            <img class="img-fluid" src="{{route('BaseUrl')}}/Pannel/assets/images/login_img.jpg" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1 p-t-b-25">
               

               

            <div class="d-flex align-items-center m-b-20">
                {{-- <img src="assets/media/image/dark-logo.png" class="m-l-15" width="40" alt=""> --}}
                <h4 class="m-0"> پنل مدیریت <span class="text-success">علمی نو</span></h4>
            </div>
            <p>برای ادامه وارد شوید.</p>
            @include('FrontEnd.errors')
            @if(\Session::has('Error'))
            <div class="alert alert-danger">
            <p>
              {{\Session::get('Error')}}
            </p>
            </div>
            @endif
            <form action="{{route('Teachers.WorkSpace.Login')}}" method="post">
                @csrf
                <div class="form-group mb-4">
                    <input type="text" class="form-control form-control-lg" 
                    name="teacher_email" autofocus
                        placeholder="ایمیل">
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control form-control-lg" 
                    name="teacher_password" placeholder="رمز عبور">
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="rememberme" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">به خاطر سپاری</label>
                    </div>

                </div>

                <button class="btn btn-primary btn-lg btn-block btn-uppercase mb-4">ورود</button>

            </form>
           </div>
    </div>
</div>

@endsection