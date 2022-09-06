@extends('layouts.maintemple')

@section('content')

    <div class="container">
        {{ Form::open(['url' => route('roles.store')]) }}
        @include('roles.forms.role_form')

        <div class="row my-1">
            <div class="col-12">
                <button class="btn btn-success">
                    Создать
                </button>
            </div>
        </div>

        {{ Form::close() }}
    </div>

@endsection
