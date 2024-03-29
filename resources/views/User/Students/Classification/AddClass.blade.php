@extends('Layouts.Pannel.Template')

@section('content')

<div class="container-fluid">
  <div class="row">
   <div class=" col-md-12">
     
    <div class="card">
     <div class="card-body"> 
       {{-- <h5>نام مقاطع فعلی </h5>

      <a href="" class=" btn btn-info btn-rounded">ابتدایی</a>
      <a href="" class=" btn btn-info btn-rounded">راهنمایی</a>
      <a href="" class=" btn btn-info btn-rounded">دبیرستان</a>
    --}}
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

    
    <form action=" {{route('Student.SubmitClass')}} " method="post">
     @csrf
    <div class=" row mt-2">
        {{-- <div class=" form-group col-md-4">
            <label for="">مقطع</label>
            <select id="section" name="section" class="custom-select mb-3">
              <option selected="">باز کردن فهرست انتخاب</option>
              @foreach (\App\models\SectionModel::all(); as $item)
                 <option value=" {{$item->sections_id}} ">{{$item->sections_name}}</option>
              @endforeach
             
          </select>
          </div> --}}
      <div class=" form-group col-md-4">
        <label for="">پایه</label>
        <select id="basic" name="basic" class="custom-select mb-3">
          <option value="" selected="">باز کردن فهرست انتخاب</option>
        
     @foreach (\App\Models\BasicModel::where('section_id',1)->get() as $item)
     <option value="{{$item->basic_id}}" >{{$item->basic_name}}</option>
     @endforeach
         
      </select>
      </div>
      <div class=" form-group col-md-4">
          <label for="">نام</label>
          <input name="class_name" type="text" class="form-control"  placeholder="نام کلاس ...">
        </div>
        <div class="form-group col-md-6">
          <button type="submit" class=" btn btn-primary mt-3">افزودن</button>
        </div>
      </div>


      <div class="row">
          <div class="col-md-6">
            <div class="basic__classes ">

            </div>

          </div>
      </div>
    </div>

    </form>
 </div>
</div>

   </div>
  </div>
 </div>





@endsection

@section('css')
    <style>
    
    </style>
@endsection

@section('js')
    
 <script>
 $(".popover").popover({ trigger: "hover" });
 $.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$("#basic").change(function(e){
e.preventDefault();
var basic_id = $(this).val();

$.ajax({

  type:'POST',
  url:'view_classes',
  data:{basic_id:basic_id},
  success:function(data){
    
     if (data.length > 360) {
      $('.basic__classes').html(data)
     }else{
       $('.basic__classes').html('<p>برای این پایه هنوز کلاسی ثبت نشده است</p>')
     }
    // $('#basic').html(data)
  
      // $('#basic').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
    }

  

   

  });

})
 </script>


@endsection