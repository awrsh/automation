@extends('Layouts.Pannel.Template')

@section('content')
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="card">
    <div class="card-body">

       <div >
            <form id="form" action=" {{route('Allbum.Classes')}} " method="post">
                    @csrf
                    <div class=" form-group row">
                            <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> مقطع </label>
                            <select id="section" name="section" class="col-md-4 custom-select custom-select-lg mb-3">
                                    <option selected="">باز کردن فهرست انتخاب</option>
                                    @foreach (\App\Models\SectionModel::all(); as $item)
                                    <option value=" {{$item->sections_id}} ">{{$item->sections_name}}</option>
                                    
                                    @endforeach                   
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
    <script >
        $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $("#section").change(function(e){
        e.preventDefault();
        var section_id = $(this).val();

        $.ajax({

        type:'POST',
        url:'get_basics',
        data:{section_id:section_id},
        success:function(data){
            if (data !== '') {
            
            $('#basic').html(data)
            }else{
            $('#basic').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
            }

        }

            });

        });



        $("#form").submit(function(e){
        e.preventDefault();
        var section_id = $(this).find('#section').val();
        var basic_id = $(this).find('#basic').val();

        $.ajax({

        type:'POST',
        url:'Allbum_getClasses',
        data:{section_id:section_id,basic_id:basic_id},
        success:function(data){
            console.log(data.length)
            if (data.length <= 183 ) {
                $('#content').html('در حال حاظر کلاسی وجود ندارد')
            
            
            }else{
                $('#content').html(data)
            }

        }

            });

        });










    </script>
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