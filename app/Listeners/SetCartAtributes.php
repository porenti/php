<?php

namespace App\Listeners;

use App\Containers\ShopSection\Cart\Actions\HandleLoginAction;
use Illuminate\Auth\Events\Login;

class SetCartAtributes
{
    public function __construct()
    {
        //
    }

    public function handle(Login $event)
    {

        $user = $event->user;
        if ($user !== null) {
            app(HandleLoginAction::class)->run($user);
        }

    }



}