@extends('Layouts.Pannel.Template');

@section('content')

<div class="container-fluid">
  <div class="row">
   <div class=" col-md-12">
     
    <div class="card">
     <div class="card-body"> 
       <h5>نام مقاطع فعلی </h5>

      <a href="" class=" btn btn-info btn-rounded">ابتدایی</a>
      <a href="" class=" btn btn-info btn-rounded">راهنمایی</a>
      <a href="" class=" btn btn-info btn-rounded">دبیرستان</a>
   


    <h5 class=" mt-3">نام </h5>
    <form action=" {{route('Student.SubmitSection')}} " method="post">
     @csrf
    <div class=" row">
      <div class=" form-group col-md-6">
        <input name="section" type="text" class="form-control"  placeholder="نام مقطع ...">
        <button type="submit" class=" btn btn-primary mt-3">افزودن</button>
      </div>
    </div>

    </form>
 </div>
</div>

   </div>
  </div>
 </div>





@endsection