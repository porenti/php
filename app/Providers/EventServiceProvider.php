<?php

namespace App\Providers;

use App\Containers\ShopSection\Coupon\Events\AddedCouponEvent;
use App\Containers\ShopSection\Coupon\Events\RemovedCouponEvent;
use App\Events\CartItemAddedEvent;
use App\Events\CartItemQuantityChangedEvent;
use App\Events\CartItemRemovedEvent;
use App\Events\ImageUploaded;
use App\Listeners\CreateImage;
use App\Listeners\RecalculateCartListener;
use App\Listeners\SetCartAtributes;
use App\Models\Shop\CartItem;
use App\Models\Shop\Order;
use App\Models\Shop\OrderItem;
use App\Observers\OrderItemObserver;
use App\Observers\OrderObserver;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ImageUploaded::class => [
            CreateImage::class,
        ],
        CartItemQuantityChangedEvent::class => [
            RecalculateCartListener::class,
        ],
        CartItemRemovedEvent::class => [
            RecalculateCartListener::class,
        ],
        CartItemAddedEvent::class => [
            RecalculateCartListener::class,
        ],
        AddedCouponEvent::class => [
            RecalculateCartListener::class,
        ],
        RemovedCouponEvent::class => [
            RecalculateCartListener::class,
        ],

        Login::class => [
            SetCartAtributes::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
        OrderItem::observe(OrderItemObserver::class);
        //$this->belongsToMany()->withPivot()->using();
        // добавили наблюдатель за класс для отловки ивентов
//        Cart::observe(CartObserver::class);
        //PurchaseItemDetail::observe(PurchaseItemDetailObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
