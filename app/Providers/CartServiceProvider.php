<?php


namespace App\Providers;

use App\Containers\ShopSection\Cart\Interfaces\CartManager;
use App\Containers\ShopSection\Cart\Utilities\Manager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{

    public function boot() //при создании приложения
    {


        $this->app->singleton(
            CartManager::class,
            Manager::class
        ); //при обращении к CartManager::class будет вызываться Manager::class

        $this->app->singleton(
            'cart',
            CartManager::class
        ); //при обращении к 'cart' будет вызываться CartManager::class
        //и все это в единственном числе (т.е. при каждом обращении будет тот же объект)

        $this->app->booted(function (Application $app) { //когда приложение создано

            $app['cart'] = $app->make(CartManager::class); //создаем привязку для обращения к $app['cart']???

            //session


            //cart

        });

    }

}
