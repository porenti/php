@extends('layouts.maintemple')

@section('ti', "Пользователь ".$user->getNickname())

@section('content')
<div class="container">
  <p>Смена пароля</p>
  <p>Пользователь: {{ $user->getNickname() }}</p>
</div>
<form method="POST" action="{{route('users.updatePassword', $user)}}">
@csrf
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Введите новый пароль для пользователя</span>
  <input type="text" class="form-control" name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
@method('post')
<button type="submit" class="btn btn-success" href="{{route('users.updatePassword', $user)}}">Смена пароля</button>
<form>
@endsection
