<?php

namespace App\Containers\ShopSection\Order\Data\Repositories;

use App\Models\Shop\Order;
use Illuminate\Support\Collection;

class OrderRepository
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getOrdersById(int $id, array $with = []): ?Collection
    {
         return Order::query()->where('user_id',$id)->with($with)->get();
    }

    public function getOrders( Array $with = []): ?Collection
    {
        return Order::query()->with($with)->get();
    }

}