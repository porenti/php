<?php


namespace App\Containers\ShopSection\Cart\Actions;


use App\Models\Shop\Cart;

class RecalculateCartAction
{
    public function run(Cart $cart): void
    {

        //dd($cart = app()['cart']->getCart()->getCoupons,$cart->getCoupons());
        $sale = 0;
        $subtotal = 0;

        $items = $cart->getCartItems();

        $coupons = $cart->getCoupons();


        foreach ($coupons as $coupon) {

            $pivot = $coupon->pivot;
            $pivot->value = 0;
        }

        foreach ($items as $item) {
            $quantity = $item->getQuantity();
            if ($item->getSubtotalAmount() === $item->getAmount()) {
                $saleForItem = 0;
                foreach ($coupons as $coupon) {
                    if ($coupon->getCouponsValueType()->getName() === "Абсолютное") {
                        $value = $coupon->getValue(); //сумма скидки в рублях
                        $subSale = $quantity * $value;
                        $saleForItem += $value;
                        $pivot = $coupon->pivot;
                        $pivot->value += $subSale;
                        $pivot->save();
                    } else {
                        $value = $item->getSubtotalAmount() / 100 * $coupon->getValue(); //сумма скидки в процентах
                        $subSale = $quantity * $value;
                        $saleForItem += $value;
                        $pivot = $coupon->pivot;
                        $pivot->value += $subSale;
                        $pivot->save();

                    }
                }
                $item->setSale($saleForItem);
            }
            $sale += $quantity * $item->getSale();
            $subtotal += $quantity * $item->getSubtotalAmount();
            $item->save();
        }
        $cart->setSubtotalAmount($subtotal); //нормальная цена товаров
        $cart->setTotalSale($sale); //сумма скидки
        $cart->setTotalAmount($subtotal - $sale); //общая цена корзины
//        dd($subtotal,$sale, $subtotal - $sale);
        $cart->save();

    }
}
