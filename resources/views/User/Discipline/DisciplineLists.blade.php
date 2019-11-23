@extends('Layouts.Pannel.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>گزارش دانش آموزی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">انضباطی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">گزارش دانش آموزی</a>
                    </li>

                </ol>
            </nav>
        </div>
        


    </div>

<form action=" {{route('Discipline.InsertPoints')}} " method="post">

    @csrf
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
        
        
                            <div class="mb-4">
                                    
                                           
                    
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <label for="">تاریخ شروع</label>
                                                            <input type="text"  name="start_time" class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">
                                                        </div>

                                                        <div class="col-md-6">
                                                                <label for="">تاریخ اتمام</label>
                                                                <input type="text"  name="expire_time" class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">
                                                            </div>
                                                </div>
                
                    
                                                <div class="row">
                                                        <div class="col-md-12  my-3">
                                                           
                                                            <button type="submit" class=" btn btn-primary">جست و جو</button>
                                                        </div>
                                                    </div>
                            
                            </div>
        
                            <hr>
        
        
                                    <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
        
                                        @foreach (\App\Models\ClassModel::all() as $key=>$item)
                                        <li class="nav-item">
                                          <a class="nav-link {{$key == 0 ? ' active':''}}" id="pills-{{$item->class_id}}-tab" data-toggle="pill" href="#pills-{{$item->class_id}} " role="tab" aria-controls="pills-{{$item->class_id}}" aria-selected=" {{$key == 0 ? 'true':'false'}} ">{{$item->class_name}}</a>
                                         </li>
                                        @endforeach
                                       
                                        
                                    </ul>
        
                                 <div class="tab-content" id="pills-tabContent2">
                                    @foreach (\App\Models\ClassModel::all() as $key=>$item)
                                     <div class="tab-pane fade {{$key == 0 ? 'show active':''}}" id="pills-{{$item->class_id}}" role="tabpanel" aria-labelledby="pills-{{$item->class_id}}-tab">
                                    
                                    
                                    
                                            <table class="table table-striped table-bordered example2">
                                                    <thead>
                                                        <tr>
                                                            <th>ردیف</th>
                                                            <th>نام - نام خانوادگی</th>
                                                            <th>شماره دانش آموزی</th>
                                                            <th>کلاس</th>
                                                            <th>نمره پیشنهادی</th>
                                                            <th>  نمایش </th>
                                                            <td>چاپ</td>
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tbody>
        
                                                        @foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get() as $key=>$students)
        
                                                        <tr>
                                                                <td> {{$key+1}} </td>
                                                                <td>{{$students->student_firstname .' '.$students->student_lastname }}</td>
                                                                <td>{{$students->student_student_number}}</td>
                                                                <td>{{$students->getClass->class_name}}</td>
                                                                <td>20</td>
                                                                <td >
                                                                    <a href="#" class=" text-center"><i class="fa fa-file-text-o fa-2x"></i></a>
                                                                </td>
                                                                <td > 
                                                                
                                                                  <a href="#" class=" text-center text-info"><i class="fa fa-print fa-2x"></i></a>
                                                               
                                                                </td>
        
                                                                
                           
                                                                
                                                         </tr>
                                                        @endforeach
                        
                                    
                                                    </tbody>
                                    
                                                </table>
            
                                    </div>
                                    @endforeach
                                </div>
                </div>
            </div>
        
</form>
    









</div>
@endsection

@section('js')
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datatable.js"></script>
<!-- begin::datepicker -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->

<script>
        $(document).ready(function(e){


     $('.custom-check1').change(function(){
        

        value =  $('.custom-check1').val()
        console.log(value)
         
     })       
    
    $('.bd-example-modal-lg').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
     $('#form').find('input[name=student_id]').val(id)
    })


    $('.bd-modal-lg').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      $.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$.ajax({

type:'get',
url:'discipline/student_chart',
data:{id:id},
success:function(data){
    if (data.length == 110) {
        $('#chart').html('<h4>موردی برای نمایش وجود ندارد</h4>')
    }else{

   $('#chart').html(data)
    }

}

        })

        })  


        })
        </script>
@endsection
@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
    
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

@endsection