@extends('Layouts.Pannel.Template');

@section('content')
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="card">
    <div class="card-body">

       <div >
            <form id="form" action="" method="post">
                    @csrf
                    
        
                   <div class=" row">
                    <div class=" form-group col-md-4 ">
                     <label for="" class=" "> <span class="text-danger">*</span> پایه </label>
                     <select id="basic" name="basic" class=" custom-select  mb-3">
                       <option selected="">باز کردن فهرست انتخاب</option> 
                       @foreach (\App\Models\BasicModel::latest()->get() as $basic)
                       <option value="{{$basic->basic_id}}" >{{$basic->basic_name}}</option> 
                       @endforeach                  
                     </select>
             </div>
             <div class=" form-group col-md-4 ">
              <label for="" class=" "> <span class="text-danger">*</span> انتخاب مورد </label>
              <select id="type" name="type" class=" custom-select  mb-3">
              
                <option value="غیبت" selected="">غیبت</option>
                <option value="تاخیر">تاخیر</option> 
                              
              </select>
      </div>
             <div class=" form-group col-md-4 ">
              <label> تاریخ </label>
              <input type="text" id="date" value="" name="date" 
                  class="form-control text-right date-picker-shamsi-list" dir="ltr">

          </div>

          
                   </div>
        
                    
                    <div class=" form-group">
                            <button type="submit"  class=" btn btn-primary">مشاهده</button>
                    </div>
        
        
        
                </form>
       </div>
<hr>
















     <div id="content">
          
     </div>
    </div>
</div>
  </div>
</div>
  </div>
 </div>
</div>



@endsection

@section('js')


<!-- begin::datepicker -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datatable.js"></script>

    <script >

$(document).ready(function(){
    
     
 $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});




$("#form").submit(function(e){
e.preventDefault();

var date = $(this).find('#date').val();
var basic = $(this).find('#basic').val();
var type = $(this).find('#type').val();

console.log({basic,date,type})
$.ajax({

type:'POST',
url:'get_absenceAndDelayList',
data:{
 basic:basic,
date:date,
type:type
},
success:function(data){
    console.log(data)
    $('#content').html(data)
   

}

    });

});





})





    </script>
@endsection


@section('css')

<!-- begin::datepicker -->
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->

<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">

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