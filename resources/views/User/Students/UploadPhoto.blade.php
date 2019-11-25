@extends('Layouts.Pannel.Template')

@section('content')
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="card">
    <div class="card-body">
            @if (\Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
        <h5 class="card-title">مراحل بارگذاری عکس ها : </h5>
        <p>
         1 - عکس دانش آموزان را به نام کد ملی یا شماره دانش آموزی ذخیره کنید       
        </p>
        <p>
         2 - نحوه نامگذاری عکس ها را مشخص کنید
        </p>
        <p>   
         3 - دکمه بارگذاری عکس ها را زده و عکس ها را انتخاب کنید
        </p>
    </div>
    <div class=" card-footer">
     <p>   
      نحوه نامگذاري عكس ها
     </p>
     <form action=" {{route('Student.setPhoto')}} " method="post" enctype="multipart/form-data">
        @csrf
     <div class="form-group">
      <div class="custom-control custom-radio">
          <input type="radio" id="customRadio" value="نام فايل ها بر اساس كد ملي" name="fileName" class="custom-control-input" checked>
          <label class="custom-control-label" for="customRadio">نام فايل ها بر اساس كد ملي
          </label>
      </div>
  </div>
  <div class="form-group">
   <div class="custom-control custom-radio">
       <input type="radio" id="customRadio2" value="نام فايل ها بر اساس شماره دانش آموزي" name="fileName" class="custom-control-input" >
       <label class="custom-control-label" for="customRadio2">نام فايل ها بر اساس شماره دانش آموزي
       </label>
   </div>
</div>

 
    <div class="custom-file col-md-3">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">انتخاب فایل</label>
     </div>
           
     <div>
        <p class="_fileName text-primary" dir="ltr"></p>
     </div>
     <button class="btn btn-primary">ارسال</button>
 </form>

</div>
</div>
  </div>
</div>
  </div>
 </div>
</div>



@endsection


@section('js')
<script >
        $('#customFile').change(function(e){
         filename= e.target.files[0].name
          // var filename = $('input[type=file]')[0].files.length ? ('input[type=file]')[0].files[0].name : "";
        $('._fileName').text(filename)
        })
        
        </script>
@endsection

