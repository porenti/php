@extends('layouts.maintemple')
<!-- обращаемся к куску ti, если есть пользователь то обращаемся к его имени, если нет создаем (ТЕРНАРНИК) -->
@section('ti', isset($user) ? "Изменить ".$user->nickname : "Создать")

@section('content')
<form method="POST"
  @if(isset($user))
    action="{{  route('users.update', $user)  }}"
  @else
    action="{{  route('users.store')  }}"
  @endif>
  @csrf
  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Ник</label>
    <input type="text" class="form-control" placeholder="nickname" name="nickname"
                  value="{{ isset($user) ? $user->getNickname() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Имя</label>
    <input type="text" class="form-control" placeholder="first_name" name="first_name"
                  value="{{ isset($user) ? $user->getFirst_name() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Фамилия</label>
    <input type="text" class="form-control" placeholder="last_name"  name="last_name"
                  value="{{ isset($user) ? $user->getLast_name() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Отчество</label>
    <input type="text" class="form-control" placeholder="middle_name" name="middle_name"
                  value="{{ isset($user) ? $user->getMiddle_name() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Гендер</label>
    <input type="text" class="form-control" placeholder="gender" name="gender"
                  value="{{ isset($user) ? $user->getGender() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Описание</label>
    <input type="text" class="form-control" placeholder="description" name="description"
                  value="{{ isset($user) ? $user->getDescription() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Почта</label>
    <input type="text" class="form-control" placeholder="email" name="email"
                  value="{{ isset($user) ? $user->getEmail() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Пароль</label>
    <input type="password" class="form-control" placeholder="password" name="password"
                  value="{{ isset($user) ? $user->getPassword() : null }}">
  </div>

  <div class="input-group mb-3 row">
    <label for="exampleFormControlInput1" class="form-label">Возраст</label>
    <input type="text" class="form-control" placeholder="age" name="age"
                  value="{{ isset($user) ? $user->getAge() : null }}">
  </div>
  @if(isset($user))
    <div style="text-align: center">
      <div class="mt-2 btn-group">
        <form method="POST" action="{{ route('users.destroy', $user) }}">
          @csrf
          @method("PUT")
          <button class="btn btn-secondary" href="{{ route('users.edit', $user) }}" type="submit"> Править </button>
        </form>

        <form method="POST" action="{{ route('users.destroy', $user) }}">
          @csrf
          @method("DELETE")
          <button class="btn btn-danger" type="submit"> Удалить </button>
        </form>
      </div>
    </div>
  @else
    <div style="text-align: center">
    <button type="submit" class="btn btn-secondary">Создать</a>
    </div>
  @endif>

</form>
@endsection
