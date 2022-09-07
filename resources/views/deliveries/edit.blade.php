
@extends('layouts.maintemple')
@section('content')

    {{ Form::model($delivery, ['url' => route('deliveries.update', $delivery), 'method'=>'PATCH']) }}
    @include('deliveries.forms.form')
    <div class="row my-1 mt-3">
        <div class="col-12">
            <button class="btn btn-success">
                Редактировать
            </button>
        </div>
    </div>
    {{ Form::close() }}
@endsection