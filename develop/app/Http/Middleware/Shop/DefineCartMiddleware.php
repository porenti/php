<?php

namespace App\Http\Middleware\Shop;

use App\Models\Shop\Cart;
use App\Models\Shop\Session;
use Illuminate\Http\Request;

class DefineCartMiddleware
{

    public function handle(Request $request, \Closure $next, ...$guards)
    {

        $sessionId = session()->getId(); //получаем
        //получаем сессию(Из модели) если есть по айди сессии и айди пользователя
        //если нет, создаем новую и заполняем временем остальное по дефолту
        $session = Session::query()
            ->firstOrCreate([
                'name' => $sessionId,
                'user_id' => auth()->id(),
            ], [                //ставим время удаления на сейчас+30 дней в минутах
                'expired_at' => now()->addMinutes(config('session.lifetime'))
            ]);

        // обращаемся к методам модели и ищем одну последнюю не отменненую корзину
        $cart = $session->getNotCanceledLastCart();

        //если не нашли, создаем
        if (null === $cart) {
            $cart = Cart::query()->create([
                'session_id' => $session->getKey()
            ]);
        }

        app()['cart']->setCart($cart);
dd(app()['cart']);
        return $next($request);
    }

}
