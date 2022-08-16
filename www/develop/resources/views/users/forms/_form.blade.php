<?php


/**
 * @var \App\Models\User $user
 */
?>
<div class="row ">
    <div class="col-6 col-lg-4">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Ник</label>
            <input type="text" class="form-control" placeholder="nickname" name="nickname"
                   autocomplete="off"

                   value="{{ isset($user) ? $user->getNickname() : null }}">
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Имя</label>
            <input type="text" class="form-control" placeholder="first_name" name="first_name"
                   autocomplete="off"
                   value="{{ $frd['first_name'] ?? old('first_name') ?? (isset($user) ? $user->getFirstName() : null) }}">
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Фамилия</label>
            <input type="text" class="form-control" placeholder="last_name" name="last_name"
                   autocomplete="off"

                   value="{{ isset($user) ? $user->getLastName() : null }}">
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Отчество</label>
            <input type="text" class="form-control" placeholder="middle_name" name="middle_name"
                   autocomplete="off"

                   value="{{ isset($user) ? $user->getMiddleName() : null }}">
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Гендер</label>
            <select name="gender_id" class="form-control">
                @foreach($genders as $genderId =>$genderName)
                    <option value="{{ $genderId }}">{{ $genderName }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Описание
                <textarea type="text" class="form-control" placeholder="description" name="description"
                          autocomplete="off">{{ isset($user) ? $user->getDescription() : null }}</textarea>
            </label>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Почта</label>
            <input type="text" class="form-control" placeholder="email" name="email"
                   autocomplete="off"

                   value="{{ isset($user) ? $user->getEmail() : null }}">
        </div>
    </div>
    @if(!isset($user))
        <div class="col-6 col-lg-4">
            <div class="input-group mb-3 row">
                <label for="exampleFormControlInput1" class="form-label">Пароль</label>
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
        </div>
    @endif
    <div class="col-lg-4 col-6">
        <div class="input-group mb-3 row">
            <label for="exampleFormControlInput1" class="form-label">Возраст</label>
            <input type="text" class="form-control" placeholder="age" name="age"
                   value="{{ isset($user) ? $user->getAge() : null }}">
        </div>
    </div>
</div>











