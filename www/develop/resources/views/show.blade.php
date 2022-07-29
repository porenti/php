@extends('layouts.maintemple')

@section('ti', "Пользователь ".$user->nickname)

@section('content')
<div class="card" style="color:black">
  <div class="card-header">
    {{$user->last_name." ".$user->first_name." ".$user->middle_name}}
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>{{$user->description}}</p>
      <footer style="color:gray">Возраст: {{$user->age}}. Гендер: {{$user->gender}}</footer>
      <footer class="blockquote-footer mt-2">{{$user->email}}</footer>
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
