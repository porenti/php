<?php

namespace App\Containers\ShopSection\Cart\Actions;

use App\Models\Shop\Cart;
use App\Models\Shop\Delivery;

class AddDeliveryAction
{
public function run(Cart $cart,int $deliveryId)
{
    $delivery = Delivery::where('id',$deliveryId)->first();
    $cart->setDeliveryId($deliveryId);
    $cart->setDeliveryPrice($delivery->getPrice());
    $cart->save();
    $cart->setDelivery($delivery);
}
}