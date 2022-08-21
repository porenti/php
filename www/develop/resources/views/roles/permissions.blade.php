@extends('layouts.maintemple')

@section('content')

    <div class="container">

        {{ Form::open(['url' => route('roles.permissions.update', $role), 'method' => 'PATCH']) }}

        @include('components.inputs.select',[
    'name' => 'permission_ids[]',
    'list' => $permissions,
    'items' => $rolePermissionIds,
    'label' => 'Права доступа',
    'multiple'=> true
])

        <button class="btn btn-success">
            Сохранить
        </button>

        {{ Form::close() }}

    </div>

@endsection
