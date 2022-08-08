<?php


/**
 * Комментарии для подсказок
 * @var \Illuminate\Pagination\LengthAwarePaginator $users
 * @var \App\Models\User $user
 */
?>

@extends('layouts.maintemple')
@section('ti')
    Пользователи
@endsection

@section('content')

    @if(isset($genders))
        <div class="container mb-3">
            <form method="GET"
                  action="{{  route('users.search')  }}">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="ФИО" name="fio">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Возраст" name="age">
                    </div>
                    <div class="col">
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option selected>Гендер</option>
                            @foreach($genders as $name => $id)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-secondary">Поиск</button>
                    </div>
                </div>
            </form>
        </div>
    @endif



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
                <td>{{$user->getGender()}}</td>
                <td>{{$user->getAge()}}</td>
                <td>{{$user->getLast_name()}}</td>  <!-- ничего страшного что я имя и фамилию перепутал же... -->
                <td>{{$user->getFirst_name()}}</td>
                <td>{{$user->getMiddle_name()}}</td>
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
        <div class="container">
            {!! $user->appends($frd ?? [])->render() !!}
        </div>
    @endif
@endsection
