@extends('Layouts.Pannel.Template')

@section('content')

<div class="container-fluid">
  <div class="row">
   <div class=" col-md-12">
     
    <div class="card">
     <div class="card-body">
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
       <h5>نام مقاطع فعلی </h5>
@foreach (\App\Models\SectionModel::all() as $item)
   <a href="" class=" btn btn-info btn-rounded">{{$item->sections_name}}</a>
@endforeach
      
     


    <h5 class=" mt-3">نام </h5>
    <form action=" {{route('Student.SubmitSection')}} " method="post">
     @csrf
    <div class=" row">
      <div class=" form-group col-md-6">
        <input name="section_name" type="text" class="form-control"  required placeholder="نام مقطع ...">
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