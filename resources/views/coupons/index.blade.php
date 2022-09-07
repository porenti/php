<?php
/**
 * @var \App\Models\Permission $permission
 * @var \App\Models\Role $role
 */
?>
@extends('layouts.maintemple')
@section('content')


    <div class="container">

        <div class="row mb-4">


            <div class="col-lg-10">
                {{ Form::open(['url' => route('coupons.index'), 'method' => 'GET']) }}
                <div class="row">
                    <div class="col-lg-11">
                        @include('components.inputs.input',[
                        'name' => 'search'
                        ])
                    </div>
                    <div class="col-lg-1">
                        <button class="btn btn-primary">
                            <i class="bi bi-1-circle"></i>
                        </button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-lg-2">
                <div class="row">
                    <div class="col-lg-6">
                        <a class="btn btn-success" href="{{ route('coupons.index') }}">Сбросить</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary" href="{{ route('coupons.create') }}">Создать</a>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col lg-1">
                id
            </div>
            <div class="col lg-1">
                Название
            </div>
            <div class="col lg-1">
                Значение
            </div>
            <div class="col lg-1">
                пользователи
            </div>
            <div class="col lg-1">
                Тип значения
            </div>
            <div class="col lg-1">
                тип купона
            </div>
            <div class="col lg-3">
                Управление
            </div>
        </div>
        @foreach($coupons as $coupon)
            <hr>
            <div class="row">
                <div class="col lg-1">
                    {{ $coupon->getKey() }}
                </div>
                <div class="col lg-1">
                    {{ $coupon->getName() }}
                </div>
                <div class="col lg-1">
                    {{ $coupon->getValue() }}
                </div>
                <div class="col lg-1">
                    <?php
                    $users = $coupon->getUser();
                    ?>
                    @isset($users)
                        @foreach($users as $user)
                            <div class="row">
                                <div class="col-12">
                                    {{ $user->getNickName() }}
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    @empty($users)
                        -
                    @endempty
                </div>
                <div class="col lg-1">
                    {{ $coupon->getCouponsValueType()->getName() }}
                </div>

                <div class="col lg-1">
                    {{ $coupon->getCouponsType()->getName() }}
                </div>

                <div class="col lg-3">
                    <div class="btn-group btn-group-sm">

                        <a class="btn btn-primary" href="{{ route('coupons.index', $coupon) }}">
                            Пользователи
                        </a>
                        <a class="btn btn-primary" href="{{ route('coupons.edit', $coupon) }}">
                            Редактировать
                        </a>

                        <button class="btn btn-danger" form="delete_coupon_{{ $coupon->getKey() }}"
                                onclick="return confirm('Вы уверены, что хотите удалить купон?')">
                            Удалить
                        </button>

                    </div>
                    {{ Form::open(['url' => route('coupons.destroy', $coupon), 'method' => 'DELETE', 'id' => 'delete_coupon_'.$coupon->getKey()]) }}
                    {{ Form::close() }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
