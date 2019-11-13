@extends('Layouts.Pannel.Template');

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


    
    <form action=" {{route('Student.SubmitClass')}} " method="post">
     @csrf
    <div class=" row mt-2">
        <div class=" form-group col-md-4">
            <label for="">مقطع</label>
            <select name="basic_id" class="custom-select mb-3">
              <option selected="">باز کردن فهرست انتخاب</option>
              @foreach (\App\models\SectionModel::all(); as $item)
              <option value=" {{$item->sections_id}} ">{{$item->sections_name}}</option>
              @endforeach
             
          </select>
          </div>
      <div class=" form-group col-md-4">
        <label for="">پایه</label>
        <select name="basic_id" class="custom-select mb-3">
          <option selected="">باز کردن فهرست انتخاب</option>
          @foreach (\App\models\BasicModel::all(); as $item)
          <option value=" {{$item->basic_id}} ">{{$item->basic_name}}</option>
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
    </div>

    </form>
 </div>
</div>

   </div>
  </div>
 </div>





@endsection