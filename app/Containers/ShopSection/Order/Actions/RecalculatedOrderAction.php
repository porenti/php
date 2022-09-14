<?php

namespace App\Containers\ShopSection\Order\Actions;

use App\Models\Shop\Order;

class RecalculatedOrderAction
{
    public function run(Order $order)
    {

        $sale = 0;
        $subtotal = 0;

        $items = $order->getOrderItems();
        $deliveryPrice = $order->getDelivery()->getPrice();
        $order->setDeliveryPrice($deliveryPrice);
        $coupons = $order->getCoupons();
        foreach ($coupons as $coupon) {

            $pivot = $coupon->pivot;
            $pivot->value = 0;
        }

        foreach ($items as $item) {
            $quantity = $item->getQuantity();
            if ($item->getSubtotalAmount()*100 === $item->getAmount()) {
                $saleForItem = 0;
                foreach ($coupons as $coupon) {
                    if ($coupon->getCouponsValueType()->getName() === "Абсолютное") {
                        $value = $coupon->getValue(); //сумма скидки в рублях
                    } else {
                        $value = $item->getSubtotalAmount() / 100 * $coupon->getValue(); //сумма скидки в процентах

                    }
                    $subSale = $quantity * $value;
                    $saleForItem += $value;
                    $pivot = $coupon->pivot;
                    $pivot->value += $subSale;
                    $pivot->saveQuietly();
                }
                $item->setSale($saleForItem);
            }
            $sale += $quantity * $item->getSale();
            $subtotal += $quantity * $item->getSubtotalAmount();
            $item->saveQuietly();
        }
        $order->setSubtotalAmount($subtotal); //нормальная цена товаров
        $order->setTotalSale($sale); //сумма скидки
        $order->setTotalAmount($subtotal - $sale + $deliveryPrice); //общая цена корзины
//        dd($subtotal,$sale, $subtotal - $sale);
        $order->saveQuietly();
        return $order;
    }
}