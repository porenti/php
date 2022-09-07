<?php

namespace App\Containers\ShopSection\Cart\Tasks;

use App\Models\Shop\Cart;
use App\Models\Shop\Session;

class UpdateCartSessionTask
{
    public function run(Cart $cart, $user)
    {
        $session = new Session();
        $cart->setUserId($user->getKey());
        $session->setUserId($user->getKey());
        $session->setName(session()->getId());
        $session->setExpiredAt(now()->addMinutes(config('session.lifetime')));
        $session->save();
        $cart->setSessionId($session->getKey());
        $cart->save();
    }
}