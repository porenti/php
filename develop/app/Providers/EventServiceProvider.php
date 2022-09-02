<?php

namespace App\Providers;

use App\Events\CartItemAddedEvent;
use App\Events\CartItemQuantityChangedEvent;
use App\Events\CartItemRemovedEvent;
use App\Events\ImageUploaded;
use App\Listeners\CreateImage;
use App\Listeners\RecalculateCartListener;
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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->belongsToMany()->withPivot()->using();
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
