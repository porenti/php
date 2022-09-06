<?php

namespace App\Listeners;

use App\Containers\ShopSection\Cart\Actions\RecalculateCartAction;
use App\Interfaces\Events\EventShouldHaveCart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecalculateCartListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param EventShouldHaveCart $event
     */
    public function handle(EventShouldHaveCart $event)
    {
        $cart = $event->getCart();
        app(RecalculateCartAction::class)->run($cart);
    }
}
