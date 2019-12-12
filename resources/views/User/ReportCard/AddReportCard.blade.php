@extends('Layouts.Pannel.Template');

@section('content')
    <div class="container-fluid">


        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3>تعریف  کارنامه</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="#">کارنامه</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">تعریف  کارنامه</a>
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

                <form action=" {{route('ReportCard.Insert')}} " method="post">
                    @csrf
                    <div class="mb-4">
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label for=""> عنوان کارنامه</label>
                                <input name="card_name" type="text" class="form-control" placeholder=""
                                       value="  ">
                            </div>


                            <div class=" form-group col-md-6 ">
                                <label for="" class="  "> <span class="text-danger">*</span> پایه </label>
                                <select id="basic" name="basic" class=" custom-select  mb-3">
                                    <option value="  ">انتخاب مورد</option>
                                    @php
                                        $sis = session()->get('ManagerSis')['sections'];
                                        if ($sis==4) {
                                          $basics =  \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                                        }else{
                                          $basics =  \App\Models\BasicModel::where('section_id', $sis )->get();
                                        }
                                    @endphp
                                    @foreach ($basics as $item)
                                        <option value="{{$item->basic_id}}" @if ( old('basic') == $item->basic_id )
                                        selected=""
                                            @endif>{{$item->basic_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class=" row">
                            <div class=" form-group col-md-6 ">
                                <label for="" class="  "> <span class="text-danger">*</span> کلاس </label>
                                <select id="class" name="class" class=" custom-select  mb-3">
                                    <option value="">ابتدا پایه را انتخاب کنید</option>
                                </select>
                            </div>

                            {{-- <div class=" form-group col-md-6 ">
                              <label for="" class="  pt-3"> <span class="text-danger">*</span> درس </label>
                              <select id="lesson" name="lesson" class=" custom-select  mb-3">
                                <option value="">انتخاب مورد</option>
                              </select>
                              </div> --}}
                              <div class="col-md-6 mb-3">
                                <label for="">گروه ازمون</label>
                                <select name="azmoon_group" class="custom-select form-control custom-select-sm mb-3">
                                    <option value="تکوینی 1">تکوینی 1</option>
                                    <option value="پایانی 1">پایانی 1</option>
                                    <option value="تکوینی 2">تکوینی 2</option>
                                    <option value="پایانی 2">پایانی 2</option>
                                    <option value="ماهانه مهر">ماهانه مهر</option>
                                    <option value="ماهانه آبان">ماهانه آبان</option>
                                    <option value="ماهانه بهمن">ماهانه بهمن</option>
                                    <option value="ماهانه اسفند">ماهانه اسفند</option>
                                    <option value="ماهانه اردیبهشت">ماهانه اردیبهشت</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class=" row">
                          <div class=" form-group col-md-6 form-inline">
                             <label for="">مدت زمان بر حسب دقیقه (مثلا : 20)</label>
                             <input type="text" name="studies_count" class=" form-control mr-2" value=" {{old('studies_count')}} ">
                          </div>
                        </div> --}}
                        <div id="lesson" class=" row">
                        </div>
                        <div class="row">
                            <div class="col-md-12  mb-3">

                                <button type="submit" class=" btn btn-primary"> افزودن مورد</button>
                            </div>
                        </div>
                    </div>
                </form>


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
        $(document).ready(function (e) {

            $('input[name=studies_date]').change(function () {
                if ($(this).val() == 'انتخاب بازه زمانی') {
                    $('.date__picker').fadeIn()
                } else {
                    $('.date__picker').fadeOut()
                }
            })

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
                    url: '{{route("ReportCard.getReportCardClasses")}}',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])
                            $('#lesson').html(data[1])
                        }
                    }

                });

            });

        })


    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
          type="text/css">

    <!-- begin::datepicker -->
    <link rel="stylesheet"
          href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

@endsection
