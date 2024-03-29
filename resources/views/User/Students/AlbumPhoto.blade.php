@extends('Layouts.Pannel.Template')

@section('content')
   
<div class="container-fluid">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="card">
    <div class="card-body">

       <div >
            <form id="form" action=" {{route('Allbum.Classes')}} " method="post">
                    @csrf
                    {{-- <div class=" form-group row">
                            <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> مقطع </label>
                            <select id="section" name="section" class="col-md-4 custom-select custom-select-lg mb-3">
                                    <option selected="">باز کردن فهرست انتخاب</option>
                                                   
                            </select>
                    </div>
         --}}
                    <div class=" form-group row">
                            <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class="col-md-4 custom-select custom-select-lg mb-3">
                                @php
                                $sis = 1;   
                                if ($sis==4) {
                                  $basics =  \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                                }else{
                                  $basics =  \App\Models\BasicModel::where('section_id', $sis )->get();
                                }
                            @endphp
                            @foreach ($basics as $item)
                            <option value=" {{$item->basic_id}} ">{{$item->basic_name}}</option>
                            @endforeach              
                            </select>
                    </div>
        
                    
                    <div class=" form-group button__wrapper">
                            <button type="submit" class=" btn btn-primary">نمایش</button>
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
        $('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')

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
                $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')

            
            }else{
                $('#content').html(data)
                $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')

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