<?php

namespace App\Containers\ShopSection\OrderItem\Actions;

use App\Containers\ShopSection\OrderItem\Data\Repositories\OrderItemRepository;
use App\Models\Shop\Order;
use Illuminate\Support\Collection;

class GetOrderItemListByOrderAction
{
    public function run(Order $order, array $columns = ['*'], array $with = []): Collection
    {
        return app(OrderItemRepository::class)
            ->getListByOrder($order, $columns, $with);

    }
}