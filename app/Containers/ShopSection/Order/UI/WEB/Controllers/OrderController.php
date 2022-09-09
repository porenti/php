<?php

namespace App\Containers\ShopSection\Order\UI\WEB\Controllers;

use App\Containers\ShopSection\Order\Actions\GetOrdersAction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = app(GetOrdersAction::class)->run(auth()->id(),['coupons']);

        return view('orders.index', compact('orders'));
    }
}
