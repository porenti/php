<?php

namespace App\Containers\ShopSection\Delivery\UI\WEB\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shop\Delivery;
use App\Models\Shop\PaymentMethod;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::with('paymentMethod')->paginate(12);
        $paymentMethods = PaymentMethod::pluck('id','name');
        return view('deliveries.index', compact('deliveries', 'paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentMethods = PaymentMethod::pluck('name','id');
        return view('deliveries.create', compact('paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $delivery = new Delivery();
        $frd = $request->validate([
            'paymentMethods_ids' => 'required|array',
            'price' => 'required',
            'name' => 'required'
        ]);
        $delivery->setName($frd['name']);
        $delivery->setPrice($frd['price']);
        $delivery->save();
        foreach ($delivery->paymentMethod() as $paymentMethodId)
        {
            $paymentMethod = PaymentMethod::where('id',$paymentMethodId)->first();

            $delivery->paymentMethod()->detach($paymentMethod);
        }
        foreach ($frd['paymentMethods_ids'] as $paymentMethodId)
        {

            $paymentMethod = PaymentMethod::where('id',$paymentMethodId)->first();
            $delivery->paymentMethod()->attach($paymentMethod);
        };
        return redirect()->route('deliveries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        $paymentMethods = PaymentMethod::pluck('name','id');
        $deliveryPaymentMethods = $delivery->paymentMethod()->pluck('id')->toArray();
        return view('deliveries.edit', compact('paymentMethods','deliveryPaymentMethods','delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop\Delivery  $delivery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Delivery $delivery)
    {
        $frd = $request->validate([
            'paymentMethods_ids' => 'required|array',
            'price' => 'required',
            'name' => 'required'
        ]);
        foreach ($delivery->paymentMethod() as $paymentMethodId)
        {
            $paymentMethod = PaymentMethod::where('id',$paymentMethodId)->first();

            $delivery->paymentMethod()->detach($paymentMethod);
        }
        foreach ($frd['paymentMethods_ids'] as $paymentMethodId)
        {

            $paymentMethod = PaymentMethod::where('id',$paymentMethodId)->first();
            $delivery->paymentMethod()->attach($paymentMethod);
        };
        $delivery->setName($frd['name']);
        $delivery->setPrice($frd['price']);
        $delivery->save();
        return redirect()->route('deliveries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop\Delivery  $delivery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('deliveries.index');
    }
}
