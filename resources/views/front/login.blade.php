@extends('front.layout.mini_master')
@section('title')
تسجيل الدخول
@endsection

@section('css')
<style>
    body{
       /* background-image:linear-gradient(45deg, #942222, #e2df1c);
       opacity: 0.9; */

};


</style>

@endsection



@section('content')

{{-- ===================--}}
<!-- form -->
@section('content')
@if(session()->has('message'))
<div class="alert col-12  alert-info alert-shade alert-dismissible fade show" role="alert">
    <strong>مبروك! .</strong>  <strong class="fnt-code c-dark">{{ session()->get('message') }} .</strong>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row ">
    <div class="col-md-5 card shade mw-center mh-center">
        <img src="{{asset('assets/dash/svg/12.jpeg')}}" alt="..." class="mw-center " height="130" width="300" >
        <hr class="hr-dashed m-0">
        <form class="" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group m-0">
                <label for="exampleInputEmail1">اسم المستخدم</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus  id="name"
                     placeholder="ادخل اسمك"  >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group m-0">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder="Password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-check pt-2">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn shade f-primary btn-block">تسجيل الدخول</button>
        </form>
    </div>

</div>
<!--  -->


{{-- ================================================ --}}

@endsection




