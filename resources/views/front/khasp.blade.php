@extends('front.layout.master')
@section('title')
نحالة لديهم منتجات
@endsection

@section('page_title')

نحالة لديهم منتجات عسل
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
@if($errors->any())
{!! implode('', $errors->all('   <div class="alert col-12  alert-forth alert-shade alert-dismissible fade show" role="alert">
    <strong>خطأ إدخال .!!</strong>  <strong class="fnt-code c-dark">:message</strong>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>')) !!}
@endif


{{-- ****** بداية الجدول ****** --}}
<div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
    <div class="card shade h-100">
        <div class="card-body">
            <h5 class="card-title" style="text-align: center;">{{$proName }}</h5>

            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الايميل</th>
                        <th scope="col">الكمية</th>
                        <th scope="col">السعر</th>
                        <th scope="col">طلب</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($lolos as $lolo )
                    <tr>
                        <td><img src="{{URL::asset('assets/dash/img/avatar')}}/{{$lolo->keeperinfo->prof_pic}}" alt="..."
							class="rounded-circle screen-user-profile"></td>
                        <td><a href="{{url('visitkeeper')}}/{{$lolo->keeperinfo->id}}" >  {{$lolo->keeperinfo->name}}</a></td>
                        <td>{{$lolo->keeperinfo->email}}</td>
                        <td>{{ $lolo->amount}}</td>
                        <td>{{ $lolo->price}}</td>
                        <td><div class="c-grey text-center col ">
							<button type="button" data-target="#exampleModal5" data-toggle="modal" data-keeperid="{{$lolo->keeperinfo->id}}"  data-amount="{{$lolo->amount}}"  data-price="{{$lolo->price}}"  class="btn flat f-second btn-block fnt-xxs ">شراء</button>
						</div></td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-center">

                {!! $lolos->render() !!}
            </div>


        </div>

    </div>
</div>


{{-- ******نهاية الجدول ****** --}}


	<!-- Modal -->
    <div class="modal w-lg fade light " id="exampleModal5" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content card shade">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">طلب شراء</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               {{-- ************************************************* --}}
               <form id='offerForm' method="post" action="{{route('orderh')}}" style="direction: rtl;">
                @csrf

                 <input type="hidden" class="form-control" id="keeperid" name ="keeperid" value="">
                 <input type="hidden" class="form-control" id="DealerId" name ="DealerId" value="{{Auth()->user()->id}}">
                 <input type="hidden" class="form-control"  name ="productId" value="{{$pro_id}}">



                    <div class="form-group">
                        <label for="" class="control-label">الكمية المتوفرة</label>
                        <input type="text" class="form-control" id="amount"name ="amount" value="">
                    </div>
                    <div class="form-group">
                        <label for="quantity">الكمية المطلوبة</label>
                        <input type="number"  class="form-control" id="quantity" name="ordered_amount" min="0" max="">
                    </div>

                    <div class="form-group">
                        <label for="quantity">السعر للبيع</label>
                        <input type="text"  class="form-control" id="price" name="ordered_price" value="">
                    </div>
                    <div class="form-group">
                        <label for="quantity">عؤض سعر </label>
                        <input type="number"  class="form-control" id="offered_price" name="offered_price" min="0" max="">
                    </div>



                    {{-- ************************************************* --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn outlined o-danger c-danger"
                            data-dismiss="modal">تراجع</button>
                    <button type="submit" class="btn outlined f-main">شراء</button>
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


    $('#exampleModal5').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever')
      var keeperid = button.data('keeperid')
      var amount = button.data('amount')
      var price = button.data('price') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      // modal.find('.modal-title').text('New message to ' + recipient)
      // modal.find('.modal-body #recipient-name').val(recipient)
      modal.find('.modal-body  #keeperid').val(keeperid)
      modal.find('.modal-body  #amount').val(amount)
      modal.find('.modal-body  #price').val(price)
      // modal.find('.modal-body  #offered_price').val(price)

    })
    </script>

@endsection









