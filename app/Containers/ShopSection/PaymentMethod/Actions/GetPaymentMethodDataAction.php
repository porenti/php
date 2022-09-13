<?php

namespace App\Containers\ShopSection\PaymentMethod\Actions;

use App\Containers\ShopSection\PaymentMethod\Data\Repositories\PaymentMethodRepository;
use Illuminate\Database\Eloquent\Collection;

class GetPaymentMethodDataAction
{
    public function run(): Collection
    {
        return app(PaymentMethodRepository::class)->getAllPaymentMethod();
    }
}