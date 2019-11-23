@extends('Layouts.Pannel.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>تعریف مورد انضباطی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">انضباطی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">تعریف مورد انضباطی</a>
                    </li>

                </ol>
            </nav>
        </div>
        


    </div>



    
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
        
            <form id="form" action=" {{route('Discipline.InsertLow')}} " method="post">
                @csrf
                            <div class="mb-4">                      
                                 <div class="row">
                                       <div class=" form-group col-md-3">
                                                <label for="">پایه</label>
                                                <select id="basic" name="basic_id" class="custom-select mb-3">
                                                  <option value="10" selected="">همه پایه ها</option>
                                                
                                             @foreach (\App\Models\BasicModel::where('section_id',1)->get() as $item)
                                             <option value="{{$item->basic_id}}" >{{$item->basic_name}}</option>
                                             @endforeach
                                                 
                                              </select>
                                              </div>
                                          
                                              <div class=" form-group col-md-5">
                                                <label for="">عنوان</label>
                                                <input name="law_title" id="law_title" type="text" class="form-control"  placeholder="">
                                              </div>
                                            

                                            
                                              
                                              <div class="col-md-4">
                                                <h6 class="card-title mt-2 mb-2"> نوع مورد</h6>
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                                      <input checked type="radio" value="تنبیهی"  id="customRadioInline1" name="law_type" class="custom-control-input">
                                                                      <label class="custom-control-label" for="customRadioInline1"> تنبیهی </label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                      <input type="radio" value="تشویقی"  id="customRadioInline2" name="law_type" class="custom-control-input">
                                                                      <label class="custom-control-label" for="customRadioInline2"> تشویقی </label>
                                                                  </div>
                                              </div>
                                            </div>



                                            <div class=" row form-group">
                                            <label for="" class="col-md-2"> تاثیر به اضای هر</label>
                                             <input type="text" id="low_count" name="low_count" class=" col-md-1 form-control form-inline">
                                             <label for="" class=" col-md-1"> بار </label>
                                              <input type="text" id="law_num" name="law_num" class=" form-control col-md-1">
                                              <label for="" class=" col-md-1"> نمره </label>
                                            </div>


                    
                                                <div class="row">
                                                        <div class="col-md-12  mb-3 button__wrapper">
                                                           
                                                            <button  type="submit" class=" btn btn-primary"> افزودن مورد</button>
                                                        </div>
                                                    </div>
                            
                            </div>
 </form>
                   
 

        <table  class="table table-striped table-bordered example3">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نوع</th>
                    <th>ضریب تاثیر گذاری</th>
                    <th>تاثیر روی نمره</th>
                    <th> پایه</th>
                    
                </tr>
                </thead>
                <tbody class=" tbody">
                @foreach (\App\Models\DisciplineLawsModel::latest()->get() as $item)
                    <tr>
                        <td>{{$item->law_title}}</td>
                        <td>{{$item->law_type}}</td>
                        <td>{{$item->law_count}}</td>
                        <td>{{$item->law_num}}</td>
                        <td>{{$item->basic_id}}</td>
                   
                    </tr>
                @endforeach
            
                
            
                </tbody>
                
          </table>
      
                </div>
            </div>




</div>
@endsection

@section('js')
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datatable.js"></script>


<script>


$(document).ready(function(e){
    
    $.ajaxSetup({
   
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   

   
   $("#form").submit(function(e){
   e.preventDefault();
   $('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')
   var basic = $(this).find('#basic').val();
   var law_title = $(this).find('#law_title').val();
   var law_type = $(this).find("input[name=law_type]").val();
   var low_count = $(this).find('#low_count').val();
   var law_num = $(this).find('#law_num').val();
   
   // console.log({basic,start_date,end_date})
   $.ajax({
   
   type:'POST',
   url:'InsertLow',
   data:{
     basic:basic,
     law_title:law_title,
     law_type:law_type,
     low_count:low_count,
     law_num:law_num
   },
   success:function(data){
       $('.tbody').append(data)
       $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
       $('input').val('') 
        },
        error:function(data){
       $('.tbody').append(data)
       $('.button__wrapper').html(' <button type="submit" class=" btn btn-danger">موارد را کامل کنید</button>')
      
        }
          });
   
      });
   
});  
   
        
    
  
   
 

        </script>
@endsection
@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
    

@endsection