@extends('front.layout.master')

@section('css')
<link rel="stylesheet" href="{{asset('assets/dash/css/styleph.css')}}">
<link rel="stylesheet" href="{{asset('assets/dash/css/stylehidden.css')}}">

@endsection
@section('title')

الصفحة الاولى

@endsection

@section('page_title')

الصفحة االاولى
@endsection

@section('content')

{{-- ===================--}}

{{-- ****** بداية الدف المخفي****** --}}
<div class="hidden">

{{-- ******** بداية دف اختيار مستلزمات ****** --}}
<div id ="accessories">

    <button class="close" onclick="document.getElementById('accessories').style.display='none'" >&#10006; Close</button>
		<header class="main-header clearfix">
			<h1 class="name" style="text-align: center;">اختيار مستلزمات</h1>
		</header>

		<div class="content clearfix">
            @foreach ($accessories as $access )
			<div class="cube-container">
				<div class="photo-cube">

					<img class="front img-responsive" src="{{URL::asset('assets/dash/img/accessory')}}/{{$access->p_photo}}" alt="">
					<div class="back photo-desc">
					  <h3>{{$access->Product_name}}</h3>
					  <p>{{$access->description }}.</p>
						<a href="{{url('accesOwners')}}/{{$access->id}}" class="button">شراء</a>

					</div>
					<img class="left img-responsive" src="{{URL::asset('assets/dash/img/accessory')}}/{{$access->p_photo}}" alt="">
					<img class="right img-responsive" src="{{URL::asset('assets/dash/img/accessory')}}/{{$access->p_photo}}" alt="">

				</div>


			</div>
            @endforeach



		</div>
   </div>
{{-- ****** نهاية دف اختيار مستلزمات ****** --}}



{{-- ******* بداية دف اختيار منتج عسل ****** --}}
   <div id ="honeyproduct">

    <button class="close" onclick="document.getElementById('honeyproduct').style.display='none'" >&#10006; Close</button>
		<header class="main-header clearfix">
			<h1 class="name"style="text-align: center;">اختيار منتج عسل</h1>
		</header>

		<div class="content clearfix">

            @foreach ($products as $product )

			 <div class="cube-container">
				<div class="photo-cube">

					<img class="front"src="{{URL::asset('assets/dash/img/hproducts')}}/{{$product->p_photo}}" alt="">
					<div class="back photo-desc">
					  <h3>{{$product->Product_name}}</h3>
					  <p>{{$product->description }}.</p>
						<a href="{{url('howner')}}/{{$product->id}}" class="button">شراء</a>
					</div>
					<img class="left" src="{{URL::asset('assets/dash/img/hproducts')}}/{{ $product->p_photo}}" alt="">
					<img class="right" src="{{URL::asset('assets/dash/img/hproducts')}}/{{ $product->p_photo}}" alt="">

				</div>
			</div>
            @endforeach

		</div>
   </div>


{{-- ****** نهاية دف اختيار منتج عسل ****** --}}

</div>
{{-- ****** نهاية الدف المخفي ****** --}}

{{-- ******* بداية دف الاختيار ****** --}}
<div class="oo" style="--n-rows: 3; --n-cols: 6">
    <style>
        .hex-cell:nth-of-type(5n + 1) {
            grid-column-start: 2
        }
    </style>
    {{-- <div class="hex-cell" ><img  onclick="honyFunction()"src="https://images.unsplash.com/photo-1519681393784-d120267933ba?w=650&amp;fm=jpg" /> </div> --}}
    <div class="hex-cell" ><img  class="img-responsive" onclick="honyFunction()"src="{{URL::asset('assets/dash/img/honey.png')}}" /> </div>
    <div class="hex-cell"><img  class="img-responsive"  onclick="accesFunction()" src="{{URL::asset('assets/dash/img/acees.png')}}" /></div>
    <div class="hex-cell"><img src="{{URL::asset('assets/dash/img/Bee.png')}}" /></div>
    <div class="hex-cell"><img src="{{URL::asset('assets/dash/img/Bee.png')}}" /></div>
    <div class="hex-cell"><img src="{{URL::asset('assets/dash/img/Bee.png')}}" /></div>
    <div class="hex-cell"><img src="{{URL::asset('assets/dash/img/Bee.png')}}" /></div>
    <div class="hex-cell"><img src="{{URL::asset('assets/dash/img/Bee.png')}}" /></div>
</div>

{{-- ****** نهاية دف الاختيار ****** --}}

{{-- ================================================ --}}

{{-- سكربت منجات العسل  --}}
<script>
window.onload = function() {
  document.getElementById('honeyproduct').style.display = 'none';
  document.getElementById('accessories').style.display = 'none';
};


function honyFunction() {
  var x = document.getElementById("honeyproduct");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
// سكربت المنتطلبات
function accesFunction() {
  var x = document.getElementById("accessories");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


</script>



@endsection






