<?php

namespace App\Containers\ShopSection\Order\Actions;

use App\Containers\ShopSection\Order\Data\Repositories\OrderRepository;

use Illuminate\Support\Collection;

class GetOrdersByIdAction
{
    public function run(int $userId, array $with = []): ?Collection
    {
        return app(OrderRepository::class)->getOrdersById($userId, $with);
    }
}