<?php
/**
 * @var \App\Models\User $user
 */
?>
@extends('layouts.maintemple')
@section('content')

    <div class="container">

        <form method="POST" action="{{  route('users.roles-update', $user)  }}">
            @csrf
            <label class="w-100">
                Роли
                <select class="form-control selectize selectize-input" multiple name="roles[]">

                    @foreach($roles as $role)
                        <option {{ $user->hasRole($role->name) ? 'selected' : null }} value="{{ $role->getKey() }}">
                            {{ $role->display_name }}
                        </option>


                    @endforeach
                </select>
            </label>
            @foreach($roles as $id => $name)
            @endforeach
            <button class="btn btn-success">
                Сохранить
            </button>
        </form>
    </div>

@endsection
