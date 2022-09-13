<?php

namespace App\Containers\ShopSection\Order\Actions;


use App\Containers\ShopSection\Order\Data\Repositories\OrderRepository;
use Illuminate\Support\Collection;

class GetOrdersAction
{
    public function run(): ?Collection
    {
        return app(OrderRepository::class)->getOrders();
    }
}