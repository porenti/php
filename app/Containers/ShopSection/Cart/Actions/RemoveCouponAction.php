<?php

namespace App\Containers\ShopSection\Cart\Actions;

use App\Containers\ShopSection\Coupon\Events\AddedCouponEvent;
use App\Containers\ShopSection\Coupon\Events\RemovedCouponEvent;
use App\Models\Shop\Cart;
use App\Models\Shop\Coupon;

class RemoveCouponAction
{
    public function run(Cart $cart, string $couponName){

        $coupon = Coupon::where('name', $couponName)->first();

        if (null !== $coupon) {
            $cart->coupons()->detach($coupon);
            event(new RemovedCouponEvent($coupon, $cart));
        }
    }
}