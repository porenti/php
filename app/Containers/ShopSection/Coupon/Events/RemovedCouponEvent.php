<?php

namespace App\Containers\ShopSection\Coupon\Events;

use App\Interfaces\Events\EventShouldHaveCart;
use App\Models\Shop\Cart;
use App\Models\Shop\Coupon;
use Illuminate\Queue\SerializesModels;

class RemovedCouponEvent implements EventShouldHaveCart
{
    use SerializesModels;

    private Cart $cart;
    private Coupon $coupon;

    public function __construct(Coupon $coupon, Cart $cart)
    {
        $this->coupon = $coupon;
        $this->cart = $cart;
    }


    public function getCart(): Cart
    {
        return $this->cart;
    }
}