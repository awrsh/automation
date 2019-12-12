@extends('Layouts.Pannel.Template')
@section('content')
<div class="container-fluid">

    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>پرسنل</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="#">پرسنل</a></li>
                    <li class="breadcrumb-item"><a href="#"> ثبت نام دبیر</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page header -->

    <div class="row">
        <div class=" col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>نام دبیر : {{$data['teacher_fullname']}}</p>
                    <form action="{{route('Teachers.RegisterStop2')}}" method="post">
@csrf
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <div class="row">

                        
                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class=" custom-select  mb-3">
                                <option value="  ">انتخاب مورد</option>
                                @php
                                $sis = session()->get('ManagerSis')['sections'];
                                if ($sis==4) {
                                $basics = \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                                }else{
                                $basics = \App\Models\BasicModel::where('section_id', $sis )->get();
                                }
                                @endphp
                                @foreach ($basics as $item)
                                <option value="{{$item->basic_id}}" @if ( old('basic')==$item->basic_id )
                                    selected=""
                                    @endif>{{$item->basic_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> کلاس </label>
                            <select id="class" name="class" class=" custom-select  mb-3">
                            </select>
                        </div>

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> درس </label>
                            <select id="lesson" name="lesson" class=" custom-select  mb-3">
                                <option value="">انتخاب مورد</option>

                            </select>
                        </div>
                    </div>
                        <button type="submit"  class="btn mb-5 btn-primary" >ثبت</button>
                    </form>
                    <h5>لیست دروس ثبت شده</p>
                    @php
                        $list = \App\Models\TeacherLessons::where('teacher_id',$data['id'])->get();
                   $i=1;
                   @endphp
                    <div class="table-responsive">
                            <table class="table table-striped table-bordered  ">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>کلاس </th>
                                    <th>درس</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody class="text-center" >
                                    @foreach ($list as $item)
                                        <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->class_name}}</td>
                                            <td>{{$item->lesson_name}}</td>
                                            <td><a href="">حذف</a></td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="text-center">
                        <a href="{{route('Personels.Teachers')}}" class="btn btn-success">ثبت اطلاعات</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
        $(document).ready(function (e) {

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#basic").change(function (e) {

                e.preventDefault();

                var basic_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '../../Studing/getStudyClasses',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])

                        }
                    }

                });

            });


            $("#basic").change(function (e) {

                e.preventDefault();

                var basic_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '../../ActivityClass/getlessens',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#lesson').html(data)

                        }
                    }

                });

            });

        
        })


    </script>
@endsection