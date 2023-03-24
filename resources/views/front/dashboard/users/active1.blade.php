@extends('front.layout.master')

@section('title')
المستخدمين المفعلين
@endsection

@section('page_title')
المستخدمين المفعلين
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
<div class="col-xs-1 col-sm-1 col-md-8 col-lg-12 p-2">
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
                        <th scope="col">الدور</th>
                        <th scope="col"></th>
                        <th scope="col"></th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td><img src="{{URL::asset('assets/dash/img/avatar')}}/{{$user->prof_pic}}" alt="..."
							class="rounded-circle screen-user-profile"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="c-grey text-center col-lg-6">

                                <button type="button"  data-toggle="modal"data-target="#exampleModal5" data-id="{{$user->id}}" class="btn main f-warning btn-block fnt-xxs ">حذف</button>

                                </div>
                                <div class="c-grey text-center col-lg-6 ">
                                    <a href="{{ route('dis_active',$user->id) }}">
                                <button type="button" class="btn main f-danger btn-block fnt-xxs "> الغاء تفعيل</button>
                                    </a>
                                </div>
                            </div>
                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
                <div class="d-flex justify-content-center">
                {!! $data->render() !!}
                </div>
        </div>

    </div>
</div>


{{-- ****** بداية مودل الحذف ****** --}}
<div class="modal w-lg fade light " id="exampleModal5" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content card shade">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> هل انت متاكد من حذف المستخدم </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           <form id='offerForm' method="post" action="{{route('destroy')}}" style="direction: rtl;">
            @csrf

             <input type="text" class="form-control" id="id" name ="id" value="">

                {{-- ************************************************* --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn outlined o-danger c-danger"
                        data-dismiss="modal">تراجع</button>
                <button type="submit" class="btn outlined f-main">حذف المستخدم </button>
                </div>
        </form>
    </div>
</div>
</div>

{{-- ****** نهاية مودل الحذف ******  --}}




{{-- ================================================ --}}

@endsection


@section('js')
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




