
@extends('layouts.maintemple')
@section('content')

    {{ Form::open(['url' => route('roles.update')]) }}
    @include('roles.forms.form')

    <div class="row my-1 mt-3">
        <div class="col-12">
            <button class="btn btn-success">
                Создать
            </button>
        </div>
    </div>

    {{ Form::close() }}
@endsection