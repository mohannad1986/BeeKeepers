<!doctype html>
<html class="no-js" lang="">

<head>
	@include('front.layout.head');
</head>

<body class="rtl" style="background-image: url({assets('assets/dash/img/back.png')})"  >

    <div class="bmd-layout-container bmd-drawer-f-l avam-container animated ">
        <main class="bmd-layout-content">
            <div class="container-fluid">
                <div class="main_wrapper">

		<!-- -------------بداية المحتوى--------------------- -->
          @yield('content')
		<!-- ---------------نهاية المحتوى------------------------ -->
                </div>

            </div>
        </main>
    </div>
</div>





@include('front.layout.footer_script')

</body>
</html>
