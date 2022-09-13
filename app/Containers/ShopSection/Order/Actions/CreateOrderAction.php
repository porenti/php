<?php

namespace App\Containers\ShopSection\Order\Actions;

use App\Containers\ShopSection\Cart\Tasks\CancelCartTask;
use App\Containers\ShopSection\Coupon\Tasks\AddOrderCouponTask;
use App\Containers\ShopSection\Order\Tasks\AddOrderStatusTask;
use App\Containers\ShopSection\OrderItem\Tasks\CreateOrderItemTask;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use App\Models\Shop\Order;
use App\Models\Shop\OrderStatus;

class CreateOrderAction
{
    /**
     * @param Cart $cart
     * @return void
     * @param CartItem $cartItem
     */
    public function run(Cart $cart): Order
    {
        $order = new Order();
        $order->setPaymentMethodId($cart->getPaymentMethodId());
        $order->setUserId($cart->getUserId());
        $order->setLastName($cart->getLastName());
        $order->setMiddleName($cart->getMiddleName());
        $order->setFirstName($cart->getFirstName());
        $order->setDeliveryPrice($cart->getDeliveryPrice());
        $order->setAddressId($cart->getAddressId());
        $order->setCartId($cart->getKey());
        $order->setEmail($cart->getEmail());
        $order->setDeliveryId($cart->getDeliveryId());
        $order->setPhone($cart->getPhone());
        $order->setSubtotalAmount($cart->getDecoratedSubTotalAmount()); //Итоговая цена без скидки
        $order->setTotalAmount($cart->getCartSum()); //Итоговая цена
        $order->setTotalSale($cart->getDecoratedTotalSale()); //Итоговая скидка

        $status = OrderStatus::first();

        $order->save();
        app(AddOrderStatusTask::class)->run($order,$status);
        app(AddOrderCouponTask::class)->run($order, $cart);
        app(CreateOrderItemTask::class)->run($cart,$order->getKey());
        app(CancelCartTask::class)->run($cart);
        //действие на запись пользователю адресса
        return $order;
    }
}