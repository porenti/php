<?php

namespace App\Containers\ShopSection\OrderItem\Actions;

use App\Models\Shop\CartItem;
use App\Models\Shop\OrderItem;

class CreateOrderItemAction
{
    public function run(CartItem $cartItem, int $orderKey)
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