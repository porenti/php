<?php

namespace App\Containers\ShopSection\Order\Tasks;

use App\Models\Shop\Order;
use App\Models\Shop\OrderStatus;

class AddOrderStatusTask
{
    public function run(Order $order, OrderStatus $status, int $id = 1)
    {
        $order->status()->attach($status, ['manager_id' => $id]);
    }
}