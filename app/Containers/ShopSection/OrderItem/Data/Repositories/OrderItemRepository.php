<?php

namespace App\Containers\ShopSection\OrderItem\Data\Repositories;

use App\Models\Shop\Order;
use App\Models\Shop\OrderItem;
use Illuminate\Support\Collection;

class OrderItemRepository
{
    private OrderItem $orderItem;

    public function __contruct(OrderItem $orderItem)
    {
        $this->orderItem = $orderItem;
    }

    public function getListByOrder(Order $order,  array $columns = ['*'], array $with = []): Collection
    {
        return $order->orderItems()->select($columns)->with($with)->get();
    }
}