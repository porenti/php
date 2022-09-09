<?php

namespace App\Containers\ShopSection\Coupon\Actions;

use App\Models\Shop\Coupon;
use App\Models\Shop\Order;

class AddOrderCouponAction
{
    public function run(Order $order, Coupon $coupon)
    {
        $pivot = $coupon->pivot;

        $order->coupons()->attach($coupon);
        $newPivot = $order->getCoupons()->first()->pivot;
        $newPivot = $pivot;
        $newPivot->save();
    }
}