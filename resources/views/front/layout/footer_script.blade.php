<script src="{{ URL::asset('assets/dash/js/vendor/modernizr.js') }}"></script>

<script src="{{ URL::asset('assets/dash/js/vendor/jquery-3.2.1.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
</script>


	<script>
		window.jQuery || document.write('<script src="../../../../public/assets/dash/js/vendor/jquery-3.2.1.min.js"><\/script>')
	</script>
	<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
		integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
		integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script>
		$(document).ready(function () {
			$('body').bootstrapMaterialDesign();
		});
	</script>
	<script>
		! function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = 'https://weatherwidget.io/js/widget.min.js';
				fjs.parentNode.insertBefore(js, fjs);
			}
		}(document, 'script', 'weatherwidget-io-js');
	</script>
    <script src="{{ URL::asset('assets/dash/js/main.js')}}"></script>
    {{-- <script src="{{ URL::asset('assets/dash/js/sliderscript.js')}}"></script> --}}

    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script><script  src="./script.js"></script>








    {{-- <script src="{{ URL::asset('assets/dash/js/persianumber.min.js')}}"></script> --}}

    {{-- ======= --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> --}}
    {{-- ============================= --}}

    {{-- <script src="{{ URL::asset('assets/dash/js/jquery.countTo.js')}}"></script>
	<script src="{{ URL::asset('assets/dash/js/jquery.easing.1.3.js')}}"></script>
	<script src="{{ URL::asset('assets/dash/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{ URL::asset('assets/dash/js/jquery.min.js')}}"></script>
	<script src="{{ URL::asset('assets/dash/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ URL::asset('assets/dash/js/jquery.jquery.waypoints.min.js')}}"></script> --}}



    {{-- ============================= --}}
    <script>

</script>
@yield('js')


