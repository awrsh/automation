<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>المینو</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/css/app.css" type="text/css">
    <!-- end::custom styles -->

    <!-- begin::favicon -->
    <link rel="shortcut icon" href="{{route('BaseUrl')}}/Pannel/assets/media/image/favicon.png">
    <!-- end::favicon -->
    @yield('css')
    <!-- begin::theme color -->
    <meta name="theme-color" content="#3f51b5" />
    <!-- end::theme color -->

</head>

<body class="bg-white h-100-vh p-t-0">

    <!-- begin::page loader-->
    <div class="page-loader">
        <div class="spinner-border"></div>
        <span>در حال بارگذاری ...</span>
    </div>
    <!-- end::page loader -->
    @yield('content')
    <!-- begin::global scripts -->
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/bundle.js"></script>
    <!-- end::global scripts -->
    @yield('js')
    <!-- begin::custom scripts -->
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/app.js"></script>
    <!-- end::custom scripts -->
  
</body>

</html>