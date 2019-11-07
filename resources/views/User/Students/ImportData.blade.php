@extends('Layouts.Pannel.Template');

@section('content')
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
      <div class="card">
          <div class="card-body">
              <div class="card-title"> اطلاعات خود را از طریق فایل اکسل وارد نمایید</div>
              <form action="/file-upload" class="dropzone dz-clickable" id="my-awesome-dropzone"><div class="dz-default dz-message"><span>فایل ها را برای ارسال اینجا بکشید</span></div></form>
          </div>
      </div>
  </div>
</div>
  </div>
 </div>
</div>



@endsection


@section('css')
   
    <!-- begin::dropzone -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dropzone/dropzone.css" type="text/css">
    <!-- begin::dropzone -->
@endsection

@section('js')

<!-- begin::dropzone -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dropzone/dropzone.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/dropzone.js"></script>
<!-- end::dropzone -->

@endsection