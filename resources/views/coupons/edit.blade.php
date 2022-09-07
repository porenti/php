@extends('layouts.maintemple')
@section('content')

    {{ Form::model($coupon,['url' => route('coupons.update', $coupon),  'method' => 'PATCH']) }}
    @include('coupons.forms.form')

    <div class="row my-1 mt-3">
        <div class="col-12">
            <button class="btn btn-success">
                Изменить
            </button>
        </div>
    </div>

    {{ Form::close() }}
@endsection