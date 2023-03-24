@extends('front.layout.master')
@section('title')
طلبات شراء قدمها تاجر العسل
@endsection

@section('page_title')

  طلبات شراء قدمها تاجر العسل
@endsection

@section('content')

{{-- ===================--}}

{{-- ****** بداية الجدول ****** --}}
<div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
    <div class="card shade h-100">
        <div class="card-body">
            <h5 class="card-title" style="text-align: center;"></h5>

            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الايميل</th>
                        <th scope="col">نوع  العسل </th>
                        <th scope="col">الكمية المطلوبة</th>
                        <th scope="col">السعر المعروض</th>
                        <th scope="col">الحالة</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order )
                    <tr>
                        <td><img src="{{URL::asset('assets/dash/img/avatar')}}/{{$order->keepers->prof_pic}}" alt="..."
							class="rounded-circle screen-user-profile"  width="40px" height="40px"></td>
                        <td>{{$order->keepers->name}}</td>
                        <td>{{$order->keepers->email}}</td>
                        @php
                        $proid=$order->productId;


                        $ua=\App\hproduct::select('Product_name')->where('id',$proid)->first();
                    @endphp
                        <td>{{$ua->Product_name}}</td>
                        <td>{{$order->amout}}</td>
                        <td>{{$order->offered_price}}</td>
                        <td>{{$order->status}}</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>

{{-- ******نهاية الجدول ****** --}}
{{-- ================================================ --}}

@endsection




