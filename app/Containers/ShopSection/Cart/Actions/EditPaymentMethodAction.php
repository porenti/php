<?php

namespace App\Containers\ShopSection\Cart\Actions;

use App\Containers\ShopSection\Cart\Data\Repositories\CartRepository;
use App\Models\Shop\Cart;

class EditPaymentMethodAction
{
    public function run(Cart $cart, int $paymentMethod)
    {
    return app(CartRepository::class)->setPaymentMethodId($cart, $paymentMethod);
    }
}