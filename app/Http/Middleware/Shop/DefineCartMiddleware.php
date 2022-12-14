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
        /*dd($sessionId, auth()->id(), Session::query()->where('name',$sessionId)->first(),
        Session::query()->where('user_id', auth()->id())->latest()->first());*/

        if (auth()->id() === null) {
            $session = Session::query()
                ->latest()->firstOrCreate([
                    'name' => $sessionId,
                ], [                //ставим время удаления на сейчас+30 дней в минутах\
                    'expired_at' => now()->addMinutes(config('session.lifetime'))
                ]);
            // обращаемся к методам модели и ищем одну последнюю не отменненую корзину

        } else {
            $session = Session::query()
                ->latest()->firstOrCreate([
                    'user_id' => auth()->id(),
                ], [                //ставим время удаления на сейчас+30 дней в минутах\
                    'expired_at' => now()->addMinutes(config('session.lifetime')),
                    'name' => $sessionId
                ]);

        }
        $cart = $session->getNotCanceledLastCart();
        //dd($session, $cart);
        //если не нашли, создаем
        if (null === $cart) {
            $cart = Cart::query()->create([
                'payment_method_id' => 1,
                'session_id' => $session->getKey(),
                'user_id' => auth()->id(),
            ]);
        }
        app()['cart']->setCart($cart);
        return $next($request);
    }

}
