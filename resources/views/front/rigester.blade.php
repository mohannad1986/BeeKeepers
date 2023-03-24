@extends('front.layout.mini_master')


@section('title')
انشاء حساب
@endsection
@section('css')
<style>
    body{



        /* background-image:linear-gradient(45deg, #942222, #e2df1c);
        opacity: 0.9; */

    }

</style>

@endsection



@section('content')
@if(session()->has('message'))
<div class="alert col-12  alert-info alert-shade alert-dismissible fade show" role="alert">
    <strong>مبروك! .</strong>  <strong class="fnt-code c-dark">{{ session()->get('message') }} .</strong>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


{{-- ===================--}}
<div class="row ">
    <div class="col-md-8 card shade mw-center mh-center" style="">
        <img src="{{asset('assets/dash/svg/12.jpeg')}}" alt="..." class="mw-center " height="130" width="300">
        <hr class="hr-dashed m-0">
        <form class=""  method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
            @csrf
            {{csrf_field()}}

            <div class="form-group m-0">
                <label for="">اسم المستخدم</label>
                <input type="text" class="form-control" id="name" name="name" class="form-control form-control @error('name') is-invalid @enderror"  autofocus  placeholder="ادخل اسمك">

                @error('name')

                  <span  role="alert">
                <strong>{{ $message }}</strong>
                </span>
                 @enderror

            </div>
            <div class="form-group m-0">
                <label for="exampleInputEmail1">البريد الالكتروني</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="ادخل بريدك الالكتروني" autocomplete="off">
                @error('email')
                <span  role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group m-0">
                <label for="exampleInputPassword1">كلمة السر</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="ادخل كلمة السر">

                @error('password')
                <span  role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group m-0">
                <label for="exampleInputPassword1">تاكيد كلمة السر</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"  name="password_confirmation" id="exampleInputPassword2" placeholder="اعد كتابة كلمة السر">
                @error('password_confirmation')
                <span  role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group m-0">
                <label for="">نوع المستخدم</label>
                <select name="TYPE" id="select" class="form-control" autocomplete="off" required>
                    <option  value='1'>نحال</option>
                    <option value='2'>تاجر عسل</option>
                    <option value='3'>تاجر مستلزمات</option>
                </select>
            </div>
            <div class="form-group m-0">
                <label for="exampleInputPassword1">صورتك </label>
                <input type="file" id="avatar" class="form-control" name="avatar" accept="image/png, image/jpeg">

            </div>


            <div class="form-check pt-2">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn shade f-primary btn-block">انشاء حساب</button>
        </form>
    </div>

</div>

{{-- ================================================ --}}

@endsection




