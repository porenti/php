@extends('layouts.maintemple')

@section('content')

    <div class="container">
        {{ Form::model($role,['url' => route('roles.update', $role), 'method' => 'PATCH']) }}
        @include('roles.forms.role_form')

        <div class="row my-3">
            <div class="col-12">
                <button class="btn btn-success" >
                    Сохранить
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

@endsection
