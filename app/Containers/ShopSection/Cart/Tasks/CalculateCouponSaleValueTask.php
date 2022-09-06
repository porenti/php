<?php

namespace App\Containers\ShopSection\Cart\Tasks;

use App\Models\Shop\Coupon;
use Illuminate\Support\Collection;

class CalculateCouponSaleValueTask
{
    public function run(Collection $cartItems, Coupon $coupon): int|float
    {
        $result = 0;
        $cartItems = $cartItems->where("sale",'>',0);



        return $result;
    }
}