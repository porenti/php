<?php

namespace App\Containers\ShopSection\PaymentMethod\Data\Repositories;

use App\Models\Shop\PaymentMethod;
use Illuminate\Database\Eloquent\Collection;

class PaymentMethodRepository
{
    private PaymentMethod $paymentMethod;
    public function __construct(?PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod ?? null;
    }
    public function getAllPaymentMethod(): Collection {
        return PaymentMethod::all();
    }
    public function getNameAndKeyPaymentMethod(): \Illuminate\Support\Collection
    {
        return PaymentMethod::pluck('name', 'id');
    }
}