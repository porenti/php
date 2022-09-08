<?php

namespace App\Containers\ShopSection\Cart\Tasks;

use App\Models\Shop\Cart;

class CancelCartTask
{
    public function run(Cart $cart)
    {
        $cart->setCanceledAt(now());
        $cart->save();
    }
}