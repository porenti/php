<?php

/**
 * Комментарии для подсказок
 * @var \Illuminate\Pagination\LengthAwarePaginator $users
 * @var \App\Models\User $user
 */
?>

@extends('layouts.maintemple')

@section('content')

    <div class="container mb-3">

        <form method="GET"
              action="{{  route('users.index')  }}">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <input type="text" class="form-control" placeholder="ФИО" value="{{ $frd['fio'] ?? null }}"
                           name="fio">
                </div>
                <div class="col-lg-2">
                    <input type="number" class="form-control" value="{{ $frd['age'] ?? null }}" placeholder="Возраст"
                           name="age">
                </div>
                @if(isset($genders))

                    <div class="col-lg-2">
                        <select class="form-select" name="gender" aria-label="Default select example">
                            @foreach($genders as  $id=> $name)
                                <option {{ (isset($frd['gender']) && $frd['gender'] === $name) ? 'selected' : null }}
                                        value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="col-lg-1">
                    <a type="submit" href="{{ route('users.index') }}" class="btn btn-secondary">Сбросить</a>
                </div>
                <div class="col-lg-1">
                    <button type="submit" class="btn btn-secondary">Поиск</button>
                </div>
            </div>
        </form>
    </div>



    <a href="{{ route('users.create') }}" class="btn btn-secondary">Добавить</a>
    <table class="table" style="color: white">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Ник</th>
            <th scope="col">Гендер</th>
            <th scope="col">Возраст</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Отчество</th>
            <th scope="col">Описание</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row"><a href="{{ route('users.show', $user) }}">{{$user->id}}</a></th>
                <td>{{$user->getNickname()}}</td>
                <td>{{$user->getGenderShortName()}}</td>
                <td>{{$user->getAge()}}</td>
                <td>{{$user->getLastName()}}</td>  <!-- ничего страшного что я имя и фамилию перепутал же... -->
                <td>{{$user->getFirstName()}}</td>
                <td>{{$user->getMiddleName()}}</td>
                <td>{{$user->getDescription()}}</td>
                <td><a class="btn btn-secondary" href="{{ route('users.edit', $user) }}"> Править </a>
                </td>
                <td>
                    <form method="POST" action="{{ route('users.hide', $user) }}">
                        @csrf
                        @method("POST")
                        <button class="btn btn-danger" type="submit"> Скрыть</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    @if(isset($users))
        @include('components.pagination',[

            'paginator' => $users,
            'paginatorValue' => 25,

        ])
    @endif

@endsection
