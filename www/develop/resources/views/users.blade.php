@extends('layouts.maintemple')

@section('ti')
Пользователи
@endsection

@section('content')
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
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row"><a href="{{ route('users.show', $user) }}">{{$user->id}}</a></th>
      <td>{{$user->nickname}}</td>
      <td>{{$user->gender}}</td>
      <td>{{$user->age}}</td>
      <td>{{$user->last_name}}</td>  <!-- ничего страшного что я имя и фамилию перепутал же... -->
      <td>{{$user->first_name}}</td>
      <td>{{$user->middle_name}}</td>
      <td>{{$user->description}}</td>
      <td><a class="btn btn-secondary" href="{{ route('users.edit', $user) }}"> Править </a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
