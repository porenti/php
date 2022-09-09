<?php

namespace App\Containers\ShopSection\Cart\Actions;

use App\Containers\ShopSection\Address\Actions\SaveAddressAction;

class EditUserDataAction
{
    public function run(array $frd)
    {

        $cart = app()['cart']->getCart();
        $user = auth()->user() ?? null;
        $addressKey = app(SaveAddressAction::class)->run($frd['address']);
        $cart->setAddressId($addressKey);
        $cart->setLastName($frd['lName']);
        $cart->setMiddleName($frd['mName']);
        $cart->setFirstName($frd['fName']);
        $cart->setPhone($frd['phone']);
        $cart->setEmail($frd['email']);
        $cart->save();
        $user?->setAddressId($addressKey);
        $user?->save();
    }
}