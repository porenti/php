<?php

namespace App\Containers\ShopSection\OrderItem\Tasks;

use App\Models\Shop\Cart;
use App\Models\Shop\OrderItem;

class CreateOrderItemTask
{
    public function run(Cart $cart, int $orderKey)
    {
        foreach ($cart->getCartItems() as $cartItem)
        {
            $orderItem = new OrderItem();
            $orderItem->setSubtotalAmount($cartItem->getSubtotalAmount());
            $orderItem->setName($cartItem->getProductName());
            $orderItem->setAmount($cartItem->getAmount());
            $orderItem->setSubtotalAmount($cartItem->getSubtotalAmount());
            $orderItem->setDescription($cartItem->getProduct()->getDescription());
            $orderItem->setProductId($cartItem->getProductId());
            $orderItem->setSale($cartItem->getSale());
            $orderItem->setQuantity($cartItem->getQuantity());
            $orderItem->setOrderId($orderKey);
            $orderItem->save();
        }
    }
}