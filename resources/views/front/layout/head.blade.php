<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title')</title>

	<meta name="description" content="nozha admin panel fully support rtl with complete dark mode css to use. ">
	<meta name=”robots” content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <link rel="apple-touch-icon" sizes="180x180" href="{{assets/dash/img/favicon/apple-touch-icon.png}}"> --}}
	{{-- <link rel="icon" type="image/png" sizes="32x32" href="{{assets/dash/img/favicon/favicon-32x32.png}}"> --}}
	{{-- <link rel="icon" type="image/png" sizes="16x16" href="{{assets/dash/img/favicon/favicon-16x16.png}}"> --}}
	{{-- <link rel="manifest" href="{{assets/dash/img/favicon/site.webmanifest}}"> --}}
	{{-- <link rel="mask-icon" href="{{assets/dash/img/favicon/safari-pinned-tab.svg}}" color="#5bbad5"> --}}
	<meta name="msapplication-TileColor" content="#2b5797">
	<meta name="theme-color" content="#ffffff">
	<!-- Place favicon.ico in the root directory -->

	<link rel="stylesheet" href="{{asset('assets/dash/css/normalize.css')}}">
	<link href="{{asset('assets/dash/css/fontawsome/all.min.css')}}" rel="stylesheet">
	<link rel="stylesheet"
		href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
		integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- <link rel="stylesheet" href="{{asset('assets/dash/css/sliderstyle.css')}}"> --}}


    <link rel="stylesheet" href="{{asset('assets/dash/css/main.css')}}">
    {{-- <style>
        body{
            background: linear-gradient(45deg, #1b5aa9, #942222);
        }

    </style> --}}

    <style>
        body{
           /* background-image: url({{asset('assets/dash/img/back.png')); */
           /* background: linear-gradient(45deg, #1b5aa9, #942222); */
        }

    </style>



    @yield('css')
