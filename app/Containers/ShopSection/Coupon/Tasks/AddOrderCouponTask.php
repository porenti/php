<?php

namespace App\Containers\ShopSection\Coupon\Tasks;

use App\Models\Shop\Cart;
use App\Models\Shop\Order;

class AddOrderCouponTask
{
    public function run(Order $order, Cart $cart)
    {
        foreach ($cart->getCoupons() as $coupon)
        {
            $pivot = $coupon->pivot;

            $order->coupons()->attach($coupon);
            $newPivot = $order->getCoupons()->first()->pivot;
            $newPivot = $pivot;
            $newPivot->save();
        }
    }
}