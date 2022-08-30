<?php

namespace App\Http\Middleware\Shop;

use App\Models\Shop\Cart;
use App\Models\Shop\Session;
use Illuminate\Http\Request;

class DefineCartMiddleware
{

    public function handle(Request $request, \Closure $next, ...$guards)
    {

        $sessionId = session()->getId();

        $session = Session::query()
            ->firstOrCreate([
                'name' => $sessionId,
                'user_id' => auth()->id(),
            ], [
                'expired_at' => now()->addMinutes(config('session.lifetime'))
            ]);


        $cart = $session->getNotCanceledLastCart();

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
