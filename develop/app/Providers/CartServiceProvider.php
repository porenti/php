<?php


namespace App\Providers;

use App\Containers\ShopSection\Cart\Interfaces\CartManager;
use App\Containers\ShopSection\Cart\Utilities\Manager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{

    public function boot()
    {


        $this->app->singleton(
            CartManager::class,
            Manager::class
        );

        $this->app->singleton(
            'cart',
            CartManager::class
        );

        $this->app->booted(function (Application $app) {


            $app['cart'] = $app->make(CartManager::class);

            //session


            //cart

        });

    }

}
