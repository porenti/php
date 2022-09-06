@extends('layouts.maintemple')
@section('content')

    {{ Form::open(['url' => route('coupons.store')]) }}
    @include('coupons.forms.form')

    <div class="row my-1 mt-3">
        <div class="col-12">
            <button class="btn btn-success">
                Создать
            </button>
        </div>
    </div>

    {{ Form::close() }}
@endsection