<!doctype html>
<html class="no-js" lang="">

<head>
	@include('front.layout.head');
</head>

<body class="rtl">

	<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
        @include('front.layout.header')
		<div id="dw-s1" class="bmd-layout-drawer bg-faded">

			@include('front.layout.sidebar')

		</div>
		<!-- -------------بداية المحتوى--------------------- -->
		<main class="bmd-layout-content">
			<div class="container-fluid ">
              {{-- -----------بداية عنوان الصفحة --------- --}}

                <div class="row">
                    <div class="page-header breadcrumb-header p-3 mr-2 ml-2 m-2">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">@yield('page_title')</h3>
                                        <span class="lite-text text-gray"> Options of Input</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="{{route('first')}}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item "><a href="">@yield('title2')</a></li>
                                    <li class="breadcrumb-item active">@yield('title1')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ------------نهاية عنونا الصفحة --------------- --}}
                <div class="jumbotron shade pt-5">  <!-- هون بداية المحتوى الحقيقي-->

			    @yield('content')
                </div>   <!-- هون نهاية المحتوى الحقيقي-->

            </div>
		</main>
		<!-- ---------------نهاية المحتوى------------------------ -->
	</div> <!-- هاد الدف تبع الكلاس الي بعد البودي  -->


	</div> <!-- هاد دف البدي  -->





</body>

</html>
@include('front.layout.footer_script')
