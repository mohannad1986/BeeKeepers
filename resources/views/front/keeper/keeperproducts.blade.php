@extends('front.layout.master')
@section('title')
منتجات النحال
@endsection

@section('page_title')

منتجات النحال
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

@if(session()->has('fail'))'   <div class="alert col-12  alert-forth alert-shade alert-dismissible fade show" role="alert">
    <strong>خطأ إدخال .!</strong> .. <strong class="fnt-code c-dark">{{ session()->get('fail') }}</strong>
    .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if($errors->any())
{!! implode('', $errors->all('   <div class="alert col-12  alert-forth alert-shade alert-dismissible fade show" role="alert">
    <strong>خطأ إدخال .!</strong> .. <strong class="fnt-code c-dark">:message</strong>
    .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>')) !!}
@endif
{{-- بداية المحتوى  --}}
<div class="row">
    @foreach ($hasproducs as $product )
    <div class="col-sm-6 col-md-4 col-lg-4">
      <div class="thumbnail text-center" >
        <?php  $hpro =  $product->hproduct; ?>
        <img src="{{URL::asset('assets/dash/img/hproducts')}}/{{ $hpro->p_photo}}" alt="..."  height="200px" width="300px" class="img-responsive">
        <div class="caption">
            <?php  $hpro =  $product->hproduct; ?>
          <h3 class="text-center">{{ $hpro->Product_name}}</h3>
          <p  class="text-center">{{$product->price}} السعر / {{$product->amount}} الكمية</p>
          <div class="row">
          @if (Auth::user()->id == $product->user_id )



                <div class="c-grey text-center col-6 ">
                    <button type="button" class="btn main f-success btn-block fnt-xxs"data-toggle="modal" data-id="{{$product->id}}" data-amount="{{$product->amount}}" data-price="{{$product->price}}" data-target="#exampleModal3" onclick="toastr.error('في حال بقت الكمية صفرية لاكثر من اسبوع سيقوم النظام بحذق المنتج لديك', 'تحذير لكمية المنتج', {timeOut: 5000})">نعديل</button>
                </div>
                <div class="c-grey text-center col-6 ">
                    <button type="button" class="btn main f-danger btn-block fnt-xxs" data-toggle="modal"data-target="#exampleModal5" data-id="{{$product->id}}">حذف</button>
                </div>

         @else
         <div class="c-grey text-center col-12 justify-content-center">
            <button type="button" class="btn main f-success btn-block fnt-xxs text-center "data-toggle="modal"  data-keeperid="{{$product->user_id}}"  data-amount="{{$product->amount}}"  data-price="{{$product->price}}"  data-productid="{{$product->hproducts_id }}" data-target="#exampleModal9">شراء</button>
        </div>


         @endif


        </div>






        </div>
      </div>
    </div>
    @endforeach
</div>
<hr>
@if (Auth::user()->id == $product->user_id )
<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="thumbnail text-center">
            <img src="{{URL::asset('assets/dash/img/qq.jpg')}}" alt="..." height="200px" width="200px" class="img-responsive">
            <div class="caption">
                <h3 class="text-center"> اضافة منتج </h3>
                <p ></p>
                <div class="c-grey text-center col-12 ">
                    <button type="button" class="btn main f-warning btn-block fnt-xxs"data-toggle="modal" data-target="#exampleModal2">اضافة منتج</button>
                </div>
            </div>
        </div>
    </div>

  </div>


</div>
@endif

 {{-- نهاية المحتوى  --}}

{{-- ======================بداية  المودلات الثلاث ========================== --}}

{{-- ****** بداية مودل تعديل منتج ****** --}}
	<!-- Modal -->
    <div class="modal w-lg fade light " id="exampleModal3" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content card shade">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعدبل منتج </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               {{-- ************************************************* --}}
               <form id='offerForm' method="post" action="{{route('keeper_update_h')}}" style="direction: rtl;">
                @csrf

                    <input type="text" class="form-control" id="id" name ="id" value="{{auth()->user()->id}}">

                    <div class="form-group">
                        <label for="" class="control-label">تعديل الكمية </label>
                        <input type="number"  class="form-control"  id="amount" name="amount" value=""  min="0" max="" >

                    </div>
                    <div class="form-group">
                        <label for="quantity">تعديل السعر </label>
                        <input type="number"  class="form-control" id="price" name="price" value="" min="0" max="">

                    </div>





                    {{-- ************************************************* --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn outlined o-danger c-danger"
                            data-dismiss="modal">تراجع</button>
                    <button type="submit" class="btn outlined f-main">تعديل</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->

{{-- ****** نهاية مةدل تعديل منتج ****** --}}

{{-- ****** بداية مودل اضافة  منتج ****** --}}
	<!-- Modal -->
    <div class="modal w-lg fade light " id="exampleModal2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content card shade">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> اضافة منتج</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form id='offerForm' method="post" action="{{route('keeper_add_h')}}" style="direction: rtl;">
                @csrf
                <input type="hidden" class="form-control" id="id" name ="userId" value="{{auth()->user()->id}}">
                <div class="form-group">
                    <label for="" class="control-label">اختيار المنتج </label>
                    <select class="form-control" name ="select_product">
                    @foreach ($all_h_products as $product )

                        <option value="{{$product->id}}">{{$product->Product_name}}</option>


                    @endforeach
                </select>
                </div>
                    <div class="form-group">
                        <label for="" class="control-label">الكمية المتوفرة</label>
                        <input type="number" class="form-control" id="quantity" name="amount" min="0" max="">
                    </div>
                    <div class="form-group">
                        <label for="quantity"> السعر </label>
                        <input type="number"  class="form-control"  id="" name="price" min="0" max="">
                    </div>

                    {{-- ************************************************* --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn outlined o-danger c-danger"
                            data-dismiss="modal">تراجع</button>
                    <button type="submit" class="btn outlined f-main">اضافة المنتج</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
{{-- ****** نهاية مودل اضافة منتج ****** --}}
{{-- ****** بداية مودل حذف منتج ****** --}}
<div class="modal w-lg fade light " id="exampleModal5" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content card shade">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> هل انت متاكد من حذف المنتج </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           <form id='offerForm' method="post" action="{{route('keeperDeleteHoney')}}" style="direction: rtl;">
            @csrf

             <input type="hidden" class="form-control" id="id" name ="id" value="">

                {{-- ************************************************* --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn outlined o-danger c-danger"
                        data-dismiss="modal">تراجع</button>
                <button type="submit" class="btn outlined f-main">حذف المنتج </button>
                </div>
        </form>
    </div>
</div>
</div>


{{-- ****** نهاية مودل حذف منتج ****** --}}
{{-- ======================نهاية  المودلات الثلاث ========================== --}}

{{-- ++++++++بداية مودل شراء منتج ++++++++++ --}}
<div class="modal w-lg fade light " id="exampleModal9" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content card shade">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           {{-- ************************************************* --}}
           <form id='offerForm' method="post" action="{{route('orderh')}}" style="direction: rtl;">
            @csrf

             <input type="text" class="form-control" id="keeperid" name ="keeperid" value="">
             <input type="text" class="form-control" id="DealerId" name ="DealerId" value="{{Auth()->user()->id}}">
             <input type="text" class="form-control" id="productid"  name ="productId" value="">



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

{{-- ++++++ نهاية مودل شراء منتج ++++++ --}}


{{-- ====================================================================== --}}


@endsection

@section('js')

<script>

    // --سكربت بتعديل المنتج ***
$('#exampleModal3').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var amount = button.data('amount')
    var price = button.data('price')

    var modal = $(this)
    modal.find('.modal-body  #id').val(id)
    modal.find('.modal-body  #amount').val(amount)
    modal.find('.modal-body  #price').val(price)


  })
</script>
<script>
    // سكربت الحذف

  $('#exampleModal5').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body  #id').val(id)


  })
  </script>

  {{-- سكربت الشراء  --}}


  <script>

    $('#exampleModal9').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever')
      var keeperid = button.data('keeperid')
      var amount = button.data('amount')
      var price = button.data('price')
      var productid = button.data('productid')

      var modal = $(this)

      modal.find('.modal-body  #keeperid').val(keeperid)
      modal.find('.modal-body  #productid').val(productid)

      modal.find('.modal-body  #amount').val(amount)
      modal.find('.modal-body  #price').val(price)
      // modal.find('.modal-body  #offered_price').val(price)

    })
    </script>

<script>


</script>


@endsection




