@extends('layouts.maintemple')

@section('ti', "Пользователь ".$user->getNickname())

@section('content')
<div class="card" style="color:black">
  <div class="card-header">
    {{$user->getLast_name()." ".$user->getFirst_name()." ".$user->getMiddle_name()}}
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>{{$user->getDescription()}}</p>
      <footer style="color:gray">Возраст: {{$user->getAge()}}. Гендер: {{$user->getGender()}}</footer>
      <footer class="blockquote-footer mt-2">{{$user->getEmail()}}</footer>
    </blockquote>
  </div>
</div>
<div style="text-align: center">
  <div class="mt-2 btn-group">
    <a class="btn btn-secondary" href="{{ route('users.edit', $user) }}"> Править </a>

    <form method="POST" action="{{ route('users.destroy', $user) }}">
      @csrf
      @method("DELETE")
      <button class="btn btn-danger" type="submit"> Удалить </button>
    </form>
  </div>
</div>
@endsection
