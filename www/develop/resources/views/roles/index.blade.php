<?php
/**
 * @var \App\Models\Permission $permission
 * @var \App\Models\Role $role
 */
?>
@extends('layouts.maintemple')
@section('content')


    <div class="container">

        <div class="row">
            {{ Form::open(['url' => route('roles.index'), 'method' => 'GET']) }}
            <div class="col-lg-9">
                @include('components.inputs.input',[
                'name' => 'search'
                ])
            </div>
            {{ Form::close() }}
            <div class="col-lg-1">
                <a class="btn btn-success" href="{{ route('roles.index') }}">Сбросить</a>
            </div>
            <div class="col-1">
                <a class="btn btn-primary" href="{{ route('roles.create') }}">Создать</a>
            </div>
        </div>

        @foreach($roles as $role)
            <div class="row py-1 border-bottom">
                <div class="col-4 col-lg-1">
                    {{ $role->getKey() }}
                </div>
                <div class="col-4 col-lg-1">
                    {{ $role->getName() }}
                </div>
                <div class="col-4 col-lg-2">
                    {{ $role->getDisplayName() }}
                </div>
                <div class="col-3">
                    {{ $role->getDescription() }}
                </div>
                <div class="col-2">
                    <?php
                    $permissions = $role->getPermissions();
                    ?>

                    @foreach($permissions as $permission)
                        <div class="row">
                            <div class="col-12">
                                {{ $permission->getDisplayName() }}
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="col-3">
                    <div class="btn-group btn-group-sm">

                        <a class="btn btn-primary" href="{{ route('roles.permissions', $role) }}">
                            Права
                        </a>
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role) }}">
                            Редактировать
                        </a>

                        <button class="btn btn-danger" form="delete_role_{{ $role->getKey() }}" onclick="return confirm('Вы уверены, что хотите удалить роль?')">
                            Удалить
                        </button>

                    </div>
                    {{ Form::open(['url' => route('roles.destroy', $role), 'method' => 'DELETE', 'id' => 'delete_role_'.$role->getKey()]) }}
                    {{ Form::close() }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
