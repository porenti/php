<?php


namespace App\Containers\ShopSection\Cart\Actions;


use App\Containers\ShopSection\Coupon\Events\AddedCouponEvent;
use App\Models\Shop\Cart;
use App\Models\Shop\Coupon;
use Illuminate\Database\Eloquent\Builder;

class AddCouponAction
{
    public function run(Cart $cart, string $couponName)
    {
        $coupon = Coupon::where('name', $couponName)->first();

        if (null !== $coupon) {
            $cart->coupons()->attach($coupon);
            event(new AddedCouponEvent($coupon, $cart));
        }

    }
}
