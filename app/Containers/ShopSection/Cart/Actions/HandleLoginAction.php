<?php

namespace App\Containers\ShopSection\Cart\Actions;

use App\Containers\ShopSection\Cart\Data\Repositories\CartRepository;
use App\Containers\ShopSection\Cart\Tasks\CancelCartTask;
use App\Containers\ShopSection\Cart\Tasks\UpdateCartSessionTask;
use App\Models\Shop\Cart;
use Illuminate\Database\Eloquent\Builder;

class HandleLoginAction
{
    public function run($user)
    {
        $previousSession = request()->cookie('laravel_session');

        $cartUnAuth = app(CartRepository::class)
            ->getCartBySessionName($previousSession);

        $cartAuth = app(CartRepository::class)
            ->getCartByUser($user);

        $cartForCancel = $cartAuth;
        $cartForNextWork = $cartUnAuth;
        // если в текущей коризне есть товары
            if ($cartUnAuth->cart_items_count === 0) {
                // если нашли ранее оформляемую корзину
                if (null !== $cartAuth && $cartAuth->cart_items_count > 0) {
                    $cartForNextWork = $cartAuth;
                    $cartForCancel = $cartUnAuth;
                }
            }

            //КАКАЯ ТО ФУНКЦИЯ КОТОРАЯ ПРИНИМАЕТ В КАЧЕСТВЕ АРГУМЕНТА КОРЗИНУ
            //В НЕЙ(ФУНКЦИИ), МЫ УКАЗЫВАЕМ НОВУЮ СЕССИЮ ДЛЯ КОРЗИНЫ

            app(CancelCartTask::class)->run($cartForCancel);
            app(UpdateCartSessionTask::class)->run($cartForNextWork, $user);
        }



}