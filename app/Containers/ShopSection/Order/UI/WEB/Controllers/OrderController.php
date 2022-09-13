<?php

namespace App\Containers\ShopSection\Order\UI\WEB\Controllers;

use App\Containers\ShopSection\Delivery\Actions\GetDeliveryDataAction;
use App\Containers\ShopSection\Order\Actions\GetOrdersAction;
use App\Containers\ShopSection\Order\Actions\GetOrdersByIdAction;
use App\Containers\ShopSection\OrderItem\Actions\GetOrderItemListByOrderAction;
use App\Containers\ShopSection\PaymentMethod\Actions\GetPaymentMethodDataAction;
use App\Models\Shop\Order;
use App\Models\Shop\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = app(GetOrdersByIdAction::class)->run(auth()->id(),['coupons','delivery','addresses','orderItems','status']);

        return view('orders.index', compact('orders'));
    }

    public function adminIndex(Request $request)
    {
        $orders = app(GetOrdersAction::class)->run();
        return view('orders.admin', compact('orders'));
    }

    public function edit(Request $request, Order $order)
    {
        $deliveries = app(GetDeliveryDataAction::class)->run();
        $paymentMethods = app(GetPaymentMethodDataAction::class)->run();
        $orderItems = app(GetOrderItemListByOrderAction::class)
            ->run($order);
        $coupons = $order->getCoupons();
        return view('orders.edit', compact('order', 'coupons', 'orderItems','paymentMethods','deliveries'));
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
