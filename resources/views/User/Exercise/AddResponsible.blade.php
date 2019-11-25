@extends('Layouts.Pannel.Template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class=" col-md-12">

            <div class="page-header">
                <div>
                    <h3>تکالیف</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="#">تکالیف </a></li>
                            <li class="breadcrumb-item active" aria-current="page">مسئول تکالیف </li>
                        </ol>
                    </nav>
                </div>

            </div>


            <div class="card">
                <div class="card-body">
                    <form id="form" action="" method="post">
                        @csrf

                        <div class=" form-group row">
                            <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class="col-md-4 custom-select custom-select-lg mb-3">
                                @foreach (\App\Models\BasicModel::all(); as $item)
                                <option value=" {{$item->basic_id}} ">{{$item->basic_name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class=" form-group row">
                            <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> کلاس </label>
                            <select id="class" name="class"
                                class="col-md-4 classid custom-select custom-select-lg mb-3">
                                <option selected="">باز کردن فهرست انتخاب</option>

                            </select>
                        </div>


                        <div class=" form-group">
                            <button type="submit" class="button__wrapper btn btn-primary">مشاهده</button>
                        </div>
                    </form>

                    <form id="form1" action="" method="post">
                        <div class="table-responsive my-5" tabindex="7" style="overflow: hidden; outline: none;">
                            <table class="table text-center">
                                <thead class=" bg-success">
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th scope="col">نام - نام خانوادگی</th>
                                        <th scope="col">ثبت گزارش کلاسی</th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach (\App\Models\Student::all(); as $item)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{{$item->student_firstname}}} - {{$item->student_lastname}}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="ResponsibleHomeWork[]"
                                                        value="{{$item->student_id}}" class="custom-control-input"
                                                        id="customCheck-{{$i}}">
                                                    <label class="custom-control-label"
                                                        for="customCheck-{{$i}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $(document).ready(function(){
    
    $.ajaxSetup({

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

  




   $("#basic").change(function(e){
    e.preventDefault();
    var basic_id = $(this).val();

    $.ajax({

      type:'POST',
      url:'get_classes',
      data:{basic_id:basic_id},
      success:function(data){
        if (data !== '') {
          
        $('#class').html(data)
        }else{
          $('#class').html('<option>برای کلاس مربوطه پایه ای وجود ندارد </option>')
        }

      }

        });

      });

      
      $("#form").submit(function(e){
        e.preventDefault();
        $('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>');
        var class_id = $(this).find('.classid').val();
        console.log(class_id);
        $.ajax({

        type:'POST',
        url:'EditClass/ShowClasses',
        data:{class_id:class_id},
        success:function(data){
           
                $('#content').html(data)
            

        }

            });

        });

  })
</script>
@endsection