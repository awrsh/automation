@extends('Layouts.Pannel.Template');

@section('content')
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="card">
    <div class="card-body">

       <div >
            <form action="" method="post">
                    @csrf
                    <div class=" form-group row">
                            <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> مقطع </label>
                            <select id="basic" name="basic" class="col-md-4 custom-select custom-select-lg mb-3">
                              <option selected="">باز کردن فهرست انتخاب</option>                   
                            </select>
                    </div>
        
                    <div class=" form-group row">
                            <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class="col-md-4 custom-select custom-select-lg mb-3">
                              <option selected="">باز کردن فهرست انتخاب</option>                   
                            </select>
                    </div>
        
                    
                    <div class=" form-group">
                            <button type="submit" class=" btn btn-primary">مشاهده</button>
                    </div>
        
        
        
                </form>
       </div>

















        <h5 class="card-title">  آلبوم عکس دانش آموزی </h5>

        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">

            @foreach (\App\Models\ClassModel::all(); as $key=>$item)
            
            @if ($key == 0)
            <li class="nav-item">
                    <a class="nav-link active" id="pills-{{$item->class_id}}-tab" data-toggle="pill" href="#pills-{{$item->class_id}}" role="tab" aria-controls="pills-home" aria-selected="true"> {{$item->class_name}}</a>
            </li>
            @else
            <li class="nav-item">
                   <a class="nav-link " id="pills-{{$item->class_id}}-tab" data-toggle="pill" href="#pills-{{$item->class_id}}" role="tab" aria-controls="pills-home" aria-selected="true"> {{$item->class_name}}</a>
            </li>
            @endif
            @endforeach
        </ul>
        
<div class="tab-content my-5" id="pills-tabContent2">

  @foreach (\App\Models\ClassModel::all(); as $key=>$item)
            @if ($key == 0)
            <div class="tab-pane fade show active" id="pills-{{$item->class_id}}" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="row">
            
                            @foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get(); as $student)
                                <div class=" col-md-2 my-2 text-center">
                                        <div class="flex__column">
                                        <img src=" {{route('BaseUrl')}}/Pannel/assets/images/0150784058.jpg " height="100" width="75" alt="">
                                        <span>
                                            {{$student->student_firstname}} {{$student->student_lastname}}
                                        </span>
                                        </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            @else

    <div class="tab-pane fade" id="pills-{{$item->class_id}}" role="tabpanel" aria-labelledby="pills-all-tab">
        <div class="row">

                @foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get(); as $student)
                    <div class=" col-md-2 my-2 text-center">
                            <div class="flex__column">
                            <img src=" {{route('BaseUrl')}}/Pannel/assets/images/0150784058.jpg " height="100" width="75" alt="">
                            <span>
                                {{$student->student_firstname}} {{$student->student_lastname}}
                            </span>
                            </div>
                    </div>
                @endforeach
        </div>
    </div>
    @endif
 @endforeach

</div>
    </div>
</div>
  </div>
</div>
  </div>
 </div>
</div>



@endsection


@section('css')
    <style>
    .flex__column{
        display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #d6d1d1;
    background: #fff;
    box-shadow: 1px 7px 22px 3px #8e909f8f;
    border-radius: 10px;
    padding: 10px;
    cursor: default!important;
    }

    .flex__column:hover{
        box-shadow: 1px 7px 22px 3px #0027ff52;
    }

    .flex__column > span{
        margin-top: 7px;
    }
    </style>
@endsection