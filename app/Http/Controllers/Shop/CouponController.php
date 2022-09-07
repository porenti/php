<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Coupon;
use App\Models\Shop\CouponsType;
use App\Models\Shop\CouponsValueType;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $frd = $request->all();
        $coupons = Coupon::filter($frd)->paginate(12);
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couponTypes = CouponsType::pluck('name','id');
        $couponValueTypes = CouponsValueType::pluck('name','id');
        SEOMeta::setTitle('Создание купона');
        return view('coupons.create', compact("couponTypes","couponValueTypes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frd = $request->validate([
            'name' => 'required',
            'value' => 'required',
            'couponType' => 'required',
            'couponValueType' => 'required',
        ]);
        $coupon = new Coupon();
        $coupon->setName($frd['name']);
        $coupon->setValue($frd['value']);
        $coupon->setCouponTypeId($frd['couponType']);
        $coupon->setCouponValueTypeId($frd['couponValueType']);
        $coupon->save();
        return redirect()->route('coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $couponTypes = CouponsType::pluck('name','id');
        $couponValueTypes = CouponsValueType::pluck('name','id');
        SEOMeta::setTitle('Редактирование купона');
        return view('coupons.edit', compact("coupon","couponTypes","couponValueTypes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $frd = $request->validate([
            'name' => 'required',
            'value' => 'required',
            'couponType' => 'required',
            'couponValueType' => 'required',
        ]);
        $coupon;
        $coupon->setName($frd['name']);
        $coupon->setValue($frd['value']);
        $coupon->setCouponTypeId($frd['couponType']);
        $coupon->setCouponValueTypeId($frd['couponValueType']);
        $coupon->save();
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index');
    }
}
