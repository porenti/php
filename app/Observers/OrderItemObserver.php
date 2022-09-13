<?php

namespace App\Observers;

use App\Containers\ShopSection\Order\Actions\RecalculatedOrderAction;
use App\Models\Shop\OrderItem;

class OrderItemObserver
{
    /**
     * Handle the OrderItem "created" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function created(OrderItem $orderItem)
    {

        app(RecalculatedOrderAction::class)->run($orderItem->getOrder());
    }

    /**
     * Handle the OrderItem "updated" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function updating(OrderItem $orderItem)
    {
        app(RecalculatedOrderAction::class)->run($orderItem->getOrder());
    }

    /**
     * Handle the OrderItem "deleted" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function deleted(OrderItem $orderItem)
    {
        app(RecalculatedOrderAction::class)->run($orderItem->getOrder());
    }

    /**
     * Handle the OrderItem "restored" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function restored(OrderItem $orderItem)
    {

    }

    /**
     * Handle the OrderItem "force deleted" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function forceDeleted(OrderItem $orderItem)
    {
        app(RecalculatedOrderAction::class)->run($orderItem->getOrder());
    }
}
