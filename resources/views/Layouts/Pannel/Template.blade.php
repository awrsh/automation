<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> پنل کاری </title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    {{-- <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/swiper/swiper.min.css"> --}}


    
    @yield('css')
    <!-- begin::custom styles -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/css/custom.css" type="text/css">
    <!-- end::custom styles -->

	<!-- begin::favicon -->
	<link rel="shortcut icon" href="{{route('BaseUrl')}}/Pannel/assets/media/image/favicon.png">
	<!-- end::favicon -->

	<!-- begin::theme color -->
	<meta name="theme-color" content="#3f51b5" />
	<!-- end::theme color -->

</head>
<body>

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>در حال بارگذاری ...</span>
</div>
<!-- end::page loader -->

<!-- Setting Pannel SideBar -->
{{-- @include('Layouts.Pannel.SettingSideBar'); --}}
<!-- End Setting Pannel SideBar -->

<!-- Pannel SideBar -->
@include('Layouts.Pannel.SideBar');
<!-- End Pannel SideBar -->

<!-- Pannel NavBar -->
@include('Layouts.Pannel.NavBar');
<!-- End Pannel NavBar -->

<!-- Main -->
<main class=" main-content">
 @yield('content')
</main>
<!-- End Main -->


<!-- begin::global scripts -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/bundle.js"></script>

@yield('js')

<!-- begin::custom scripts -->
{{-- <script src="{{route('BaseUrl')}}/Pannel/assets/js/custom.js"></script> --}}
<script src="{{route('BaseUrl')}}/Pannel/assets/js/app.js"></script>
<!-- end::custom scripts -->
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/sweet-alert.js"></script>

</body>
</html>
