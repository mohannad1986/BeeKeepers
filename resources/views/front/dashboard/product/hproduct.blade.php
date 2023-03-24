@extends('front.layout.master')
@section('title')
 منتجات العسل
@endsection

@section('page_title')

منتجات العسل
@endsection
@section('title1')

منتجات العسل
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
    <strong>خطأ إدخال .!</strong> .. <strong class="fnt-code c-dark">:message</strong>
    .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>')) !!}
@endif
{{-- بداية المحتوى  --}}
<div class="row">
    @foreach ($products as $product )
    <div class="col-sm-6 col-md-4 col-lg-4">
      <div class="thumbnail text-center" >

        <img src="{{URL::asset('assets/dash/img/hproducts/')}}/{{ $product->p_photo}}" alt="..."  height="200px" width="200px" >
        <div class="caption">
          <h3  class="text-center">{{ $product->Product_name}}</h3>
          <p  class="text-center">{{$product->description}}</p>
          <div class="row">
                <div class="c-grey text-center col-6 ">
                    <button type="button" class="btn main f-success btn-block fnt-xxs"data-toggle="modal" data-id="{{$product->id}}"   data-description="{{$product->description}}"  data-name="{{$product->Product_name}}" data-target="#exampleModal3">نعديل</button>
                </div>
                <div class="c-grey text-center col-6 ">
                    <button type="button" class="btn main f-danger btn-block fnt-xxs" data-toggle="modal"data-target="#exampleModal5" data-id="{{$product->id}}">حذف</button>
                </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
<hr>
<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="thumbnail text-center">
            <img src="{{URL::asset('assets/dash/img/qq.jpg')}}" alt="..." height="200px" width="200px" class="img-responsive">
            <div class="caption">
                <h3 class="text-center"> اضافة منتج </h3>
                <p></p>
                <div class="c-grey text-center col-12 ">
                    <button type="button" class="btn main f-warning btn-block fnt-xxs"data-toggle="modal" data-target="#exampleModal2">اضافة منتج</button>
                </div>
            </div>
        </div>
    </div>

  </div>


</div>

 {{-- نهاية المحتوى  --}}


{{-- ================================================ --}}
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
               <form id='offerForm' method="post" action="{{route('update_honey')}}" style="direction: rtl;">
                @csrf

                    <input type="text" class="form-control" id="id" name ="id" value="">

                    <div class="form-group">
                        <label for="" class="control-label">تعديل الاسم </label>
                        <input type="text" class="form-control"  id="name" name="Product_name">
                    </div>
                    <div class="form-group">
                        <label for="quantity">تعديل الوصف </label>
                        <input type="text"  class="form-control" id="description" name="description" >
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
                <h5 class="modal-title" id="exampleModalLabel"> اضافة منتج </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form id='offerForm' method="post" action="{{route('create_honey')}}" style="direction: rtl;" enctype="multipart/form-data">
                @csrf
                {{csrf_field()}}

                    <div class="form-group">
                        <label for="" class="control-label">اسم المنتج </label>
                        <input type="text" class="form-control" id="quantity" name="Product_name" >
                    </div>
                    <div class="form-group">
                        <label for="quantity">الوصف</label>
                        <input type="text"  class="form-control" id="description" name="description" >
                    </div>
                    <div class="form-group">
                        <label for="">تحميل صورة </label>
                        <input type="file" id="photo" class="form-control" name="photo" accept="">

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
           <form id='offerForm' method="post" action="{{route('destroy_honey')}}" style="direction: rtl;"  enctype="multipart/form-data">
            @csrf
            {{csrf_field()}}

             <input type="text" class="form-control" id="id" name ="id" value="">

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


@endsection

@section('js')

<script>

    // --سكربت بتعديل المنتج ***
$('#exampleModal3').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var description = button.data('description')
    var name = button.data('name')

    var modal = $(this)
    modal.find('.modal-body  #id').val(id)
    modal.find('.modal-body  #name').val(name)
    modal.find('.modal-body  #description').val(description)


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


@endsection




