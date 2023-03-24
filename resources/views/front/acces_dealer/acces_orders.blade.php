@extends('front.layout.master')
@section('title')
طلبات شراء مستلزمات
@endsection

@section('page_title')

طلبات شراء مستلزمات
@endsection

@section('content')

{{-- ===================--}}
@if(session()->has('message'))
<div class="alert col-12  alert-info alert-shade alert-dismissible fade show" role="alert">
    <strong>مبروك! .</strong>  <strong class="fnt-code c-dark">{{ session()->get('message') }} .</strong>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


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
                        <th scope="col">اسم النحال</th>
                        <th scope="col">الايميل</th>
                        <th scope="col">نوع  المستلزم </th>
                        <th scope="col">الكمية المطلوبة</th>
                        <th scope="col">السعر المعروض</th>
                        <th scope="col">الحالة</th>
                        <th scope="col">التصرف</th>



                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td><img src="{{URL::asset('assets/dash/img/avatar')}}/{{$order->keepersOrderAcces->prof_pic}}" alt="..."
							class="rounded-circle screen-user-profile"></td>
                            <td>{{$order->keepersOrderAcces->name}}</td>
                            <td>{{$order->keepersOrderAcces->email}}</td>
                            @php
                            $proid=$order->accessoryId;


                            $ua=\App\accessories::select('Product_name')->where('id',$proid)->first();
                        @endphp
                       <td>{{$ua->Product_name}} </td>
                       <td>{{$order->amout}}</td>
                       <td>{{$order->offered_price}}</td>
                       <td>{{$order->status}}</td>
                        <td>
                        <div class="row">
                        <div class="c-grey text-center col-6 ">
                            <a href="{{url('accept_ACCorder')}}/{{$order->id}}"><button type="button"  class="btn main f-warning btn-block fnt-xxl ">قبول</button></a>
                        </div>
                        <div class="c-grey text-center col-6 ">

			                <button type="button" data-toggle="modal" data-target="#exampleModal" data-id="{{$order->id}}" class="btn main f-success btn-block fnt-xxs ">رفض</button>
                        </div>
                        </div>
						</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>

{{-- ******نهاية الجدول ****** --}}
<!-- Modal -->
<div class="modal w-lg fade light " id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content card shade">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من رفض الطلب ؟</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           {{-- ************************************************* --}}
           <form id='offerForm' method="post" action="{{route('refuse_ACCorder')}}" style="direction: rtl;">
            @csrf
            <input type="hidden" class="form-control" id="id" name ="id" value="">

                {{-- ************************************************* --}}
             </div>
                <div class="modal-footer">
                    <button type="button" class="btn outlined o-danger c-danger"
                        data-dismiss="modal">تراجع</button>
                <button type="submit" class="btn outlined f-main">ارفض الطلب</button>
                </div>
        </form>
    </div>
</div>
</div>

<!-- Modal -->

{{-- ================================================ --}}

@endsection

@section('js')
<script>


    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')
      var modal = $(this)
      modal.find('.modal-body  #id').val(id)
    })

</script>

@endsection




