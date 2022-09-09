<?php

namespace App\Containers\ShopSection\Order\Actions;

use App\Containers\ShopSection\Cart\Tasks\CancelCartTask;
use App\Containers\ShopSection\Coupon\Actions\AddOrderCouponAction;
use App\Containers\ShopSection\OrderItem\Actions\CreateOrderItemAction;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use App\Models\Shop\Order;

class CreateOrderAction
{
    /**
     * @param Cart $cart
     * @return void
     * @param CartItem $cartItem
     */
    public function run(Cart $cart)
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

        $order->save();
        foreach ($cart->getCoupons() as $coupon)
        {
            app(AddOrderCouponAction::class)->run($order, $coupon);
        }
        foreach ($cart->getCartItems() as $cartItem)
        {
            app(CreateOrderItemAction::class)->run($cartItem,$order->getKey());
        }
        app(CancelCartTask::class)->run($cart);
    }
}