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
                    <li class="breadcrumb-item"><a href="#">ثبت نام پرسنل</a></li>
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

</div>

@endsection