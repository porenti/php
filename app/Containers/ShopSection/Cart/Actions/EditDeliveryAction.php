<?php

namespace App\Containers\ShopSection\Cart\Actions;

use App\Models\Shop\Cart;

class EditDeliveryAction
{
    public function run(Cart $cart, int $paymentMethod)
    {
        dd($cart, $paymentMethod);
    }
}