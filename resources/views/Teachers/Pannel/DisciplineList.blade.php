@extends('Layouts.Teachers.Template');

@section('content')
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>گزارش انظباطی دانش آموزان</h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">انظباطی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">گزارش انظباطی دانش آموزان</a>
                    </li>

                </ol>
            </nav> --}}
        </div>
    
    </div> 
        
                                    <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
        
                                    @foreach($teacher_lessons as $key=>$item)
                       
                                        <li class="nav-item">
                                          <a class="nav-link {{$key == 0 ? ' active':''}}" id="pills-{{$item->id}}-tab" data-toggle="pill" href="#pills-{{$item->id}} " role="tab" aria-controls="pills-{{$item->id}}" aria-selected=" {{$key == 0 ? 'true':'false'}} ">
                                              {{$item->class_name}}        
                                          </a>
                                        </li>
                                     @endforeach
                                       
                                        
                                    </ul> 
        
                                 <div class="tab-content" id="pills-tabContent2">
                                    @foreach($teacher_lessons as $key=>$item)   
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
                                                                
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $class_id=\App\Models\ClassModel::where('class_name',$item->class_name)->first()->class_id;
                                                         @endphp
                                                            @foreach (\App\Models\Student::where('student_student_class',$class_id)->get() as $key=>$students)
            
                                                            <tr>
                                                                    <td> {{$key+1}} </td>
                                                                    <td>{{$students->student_firstname .' '.$students->student_lastname }}</td>
                                                                    <td>{{$students->student_student_number}}</td>
                                                                    <td>{{$students->getClass->class_name}}</td>
                                                                    <td>20</td>
                                                                    <td >
                                                                        <a href=" {{route('Teachers.WorkSpace.DisciplineShow',$students)}} " class=" text-center"><i class="fa fa-file-text-o fa-2x"></i></a>
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