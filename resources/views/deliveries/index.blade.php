<?php
/**
 * @var  App\Models\Shop\Delivery $delivery
 * @var App\Models\Shop\PaymentMethod $paymentMethod
 */
?>
@extends('layouts.maintemple')
@section('content')

    <div class="col-1">
        <a class="btn btn-primary" href="{{ route('deliveries.create') }}">Создать</a>

    </div>
    <hr>
    <div class="container">
        @foreach($deliveries as $delivery)
            <div class="row py-1 border-bottom mb-2">
                <div class="col-lg-1">
                    {{ $delivery->getKey() }}
                </div>
                <div class="col-lg-3">
                    {{ $delivery->getName() }}
                </div>
                <div class="col-lg-2">
                    {{ $delivery->getPrice() }}
                </div>
                <div class="col-lg-3">
                    <?php
                    $paymentMethods = $delivery->getPaymentMethod();
                    ?>
                    @if ($paymentMethods->count() === 0)
                        Способы оплаты не указаны
                    @endif
                    @if ($paymentMethods->count() !== 0)
                        @foreach($paymentMethods as $paymentMethod)
                            <div class="row">
                                <div class="col-12">
                                    {{ $paymentMethod->getName() }}
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

                <div class="col-3">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('deliveries.edit', $delivery) }}">
                            Редактировать
                        </a>

                        <button class="btn btn-danger" form="delete_delivery_{{ $delivery->getKey() }}"
                                onclick="return confirm('Вы уверены, что хотите удалить роль?')">
                            Удалить
                        </button>

                    </div>
                    {{ Form::open(['url' => route('deliveries.destroy', $delivery), 'method' => 'DELETE', 'id' => 'delete_delivery_'.$delivery->getKey()]) }}
                    {{ Form::close() }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
