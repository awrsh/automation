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
                        <li class="breadcrumb-item"><a href="#">لیست دبیران</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end::page header -->
    
        <div class="row">
            <div class="col-md-12">
                    <div class="card" id="listpersonalRL">

                            <div class="card-body">
                                <div class="table-responsive my-5" tabindex="7"
                                    style="overflow: hidden; outline: none;">
                                    <table class="table example2 text-center">
                                        <thead class="">
                                            <tr>
                                                <th scope="col">ردیف</th>
                                                <th scope="col">نام و نام خانوادگی</th>
                                                <th scope="col"> دروس </th>
                                                <th scope="col">تلفن همراه</th>
                                                <th scope="col">ایمیل</th>
                                                <th scope="col"> کلمه عبور</th>
                                                <th scope="col">ویرایش</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $i =1;
                                        $listPersonal =
                                        \App\Models\Teacher::where('school_id',session()->get('ManagerSis')['id'])->get();


                                        @endphp
                                        <tbody>
                                            @foreach ($listPersonal as $item)
                                            @php
                                                $lessons =$item->teacher_lessons;
$les ="";
                                            @endphp
                                            <tr>
                                                <th scope="row">{{$i}}</th>
                                                <td>{{$item->teacher_fullname}}</td>
                                                <td>
                                                    @foreach ($lessons as $l)
                                                    @php
                                                        
                                                    @endphp
                                                    @if ($l->lesson_name==$les)
                                                       @php
                                                           $les="$l->lesson_name";
                                                       @endphp
                                                    @else
                                                        @php
                                                              $les.=" $l->lesson_name ";
                                                        @endphp
                                                    @endif 
                                                    @endforeach
                                                    {{$les}}
                                                    </td>
                                                <td>{{$item->teacher_mobile}}</td>
                                                <td>{{$item->teacher_email}}</td>
                                                <td>{{$item->teacher_pw}}</td>
                                                <td><a href="{{route('Personels.ShowTeacher')}}/{{$item->id}}" class="btn btn-outline-primary">ویرایش</a>
                                                </td>
                                            <td><a href="{{route('Personels.DeleteTeacher')}}/{{$item->id}}" class="btn btn-outline-danger">حذف</a></td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
</div>
@endsection