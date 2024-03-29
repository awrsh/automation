@extends('Layouts.Pannel.Template')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class=" col-md-12">

      <div class="page-header">
        <div>
          <h3>کلاس بندی</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
              <li class="breadcrumb-item"><a href="#">دانش اموزان </a></li>
              <li class="breadcrumb-item active" aria-current="page">کلاس بندی</li>
            </ol>
          </nav>
        </div>

      </div>

      <div class="card">
        <div class="card-header">عنوان محتوا</div>
        <div class="card-body">
          <form id="form" action=" {{route('Student.EditClassShow')}} " method="post">
            @csrf
            {{-- <div class=" form-group row">
              <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> مقطع </label>
              <select id="section" name="section" class="col-md-4 custom-select custom-select-lg mb-3">
                <option selected="">باز کردن فهرست انتخاب</option>
                @foreach (\App\Models\SectionModel::all(); as $item)
                <option value=" {{$item->sections_id}} ">{{$item->sections_name}}</option>

                @endforeach
              </select>
            </div> --}}

            <div class=" form-group row">
              <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> پایه </label>
              <select id="basic" name="basic" class="col-md-4 custom-select custom-select-lg mb-3">
                <option value="" selected="">باز کردن فهرست انتخاب</option>

                @foreach (\App\Models\BasicModel::where('section_id',Session::get('ManagerSis')['sections'])->get() as $item)
                <option value="{{$item->basic_id}}" >{{$item->basic_name}}</option>
                @endforeach

              </select>
            </div>

            <div class=" form-group row">
              <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> کلاس </label>
              <select id="class" name="class" class="col-md-4 classid custom-select custom-select-lg mb-3">
                <option selected="">ابتدا پایه را انتخاب کنید</option>

              </select>
            </div>


            <div class=" form-group button__wrapper">
              <button type="submit" class=" btn btn-primary">انتخاب کلاس</button>
            </div>
          </form>



          <div class="table-responsive my-5" tabindex="7" style="overflow: hidden; outline: none;">
            
            <div class=" container">
              <span class=" text-muted">راهنما: </span>
              <span class=" text-muted">لطفا پس از  انتخاب کلاس مورد نظر , دانش اموزان کلاس بندی نشده را به کلاس اضافه کنید</span>
              <div class="row">
                <div class=" col-md-5">
                  <form id="form2" action="" method="post">
                    <div class=" form-group ">
                      <label for="" class=" pt-3"> <span class="text-danger">*</span> کلاس </label>
                      <select id="content" class=" custom-select student_list_ol custom-select-lg mb-3" size="10" multiple>

                      </select>
                    </div>



                </div>
                <div class=" col-md-2">
                  <div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 150px;
              margin-right: 30px;"> <i class=" fa fa-angle-left fa-2x"></i> </button>
                  </div>
                  </form>
                  <form action="" id="form3" method="post">
                    <button type="submit" class="btn btn-primary" style="margin-right: 30px;
            margin-top: 20px;"><i class=" fa fa-angle-right fa-2x"></i></button>
                </div>
                <div class=" col-md-5">
                  <div class=" form-group ">
                    <label for="" class=" pt-3"> <span class="text-danger">*</span> کلاس بندی نشده </label>
                    <select id="content2" class=" custom-select student_list_ul custom-select-lg mb-3" size="10" multiple>

                      @foreach ($list_ul as $li)
                    <option value="{{$li->student_id}}">{{$li->student_firstname}} - {{$li->student_lastname}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                </form>
              </div>
            </div>

            <!-- <table class="table text-center">
              <thead class=" bg-success">
                <tr>
                  <th scope="col">کلاس</th>
                  <th scope="col">هشت یک</th>
                  <th scope="col"> هشت دو</th>
                  <th scope="col">هشت سه</th>
                  <th scope="col">هشت چهار</th>
                  <th scope="col"> هشت پنج</th>
                  <th scope="col">هشت شش</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">معدل</th>
                  <td>11</td>
                  <td>16</td>
                  <td>19</td>
                  <td>17</td>
                  <td>15</td>
                  <td>14</td>

                </tr>
                <tr>
                  <th scope="row">تعداد افراد</th>
                  <td>24</td>
                  <td>21</td>
                  <td>19</td>
                  <td>30</td>
                  <td>25</td>
                  <td>24</td>

                </tr>
              </tbody>
            </table> -->

            <br><br>
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
<script>
  $(document).ready(function(){

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
          $('#class').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
        }

      }

        });

      });


      $("#form").submit(function(e){
        e.preventDefault();
        $('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')
        var class_id = $(this).find('.classid').val();

        $.ajax({

        type:'POST',
        url:'EditClass/ShowClasses',
        data:{class_id:class_id},
        success:function(data){

                $('#content').html(data)
                $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')

        }

            });

        });





        $("#form2").submit(function(e){
        e.preventDefault();
        var student_list_ol = $(this).find('.student_list_ol').val();

        $.ajax({

        type:'POST',
        url:'ExitClass',
        data:{student_list_ol:student_list_ol},
        success:function(data){

                $('#content2').html(data);
                $('#form').submit();


        }

            });

        });



        $("#form3").submit(function(e){
        e.preventDefault();
        var id_students = $('.student_list_ul').val();
        var class_id = $("#form").find('.classid').val();
        console.log(id_students);
        $.ajax({

        type:'POST',
        url:'EnterClass',
        data:{class_id:class_id,id_students:id_students},
        success:function(data){

                $('#content').html(data[0])
                $('#content2').html(data[1]);

        }

            });

        });

  })
</script>
@endsection
