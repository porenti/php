<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Корзина');
    }

    public function update(Request $request, Product $product)
    {


        $productId = $request->input('product_id');
        $cartItemId = $request->input('cart_item_id');


        $quantity = $request->input('quantity') ?? 1;



        return redirect()->route('catalog.index');
    }
}
