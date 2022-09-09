<?php

namespace App\Containers\ShopSection\Order\Actions;

use App\Containers\ShopSection\Order\Data\Repositories\OrderRepository;
use Illuminate\Database\Eloquent\Collection;

class GetOrdersAction
{
    public function run(int $userId, Array $with = []): ?Collection
    {
        return app(OrderRepository::class)->getOrdersById($userId, $with);
    }
}