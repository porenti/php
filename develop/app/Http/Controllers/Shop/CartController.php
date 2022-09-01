<?php

namespace App\Http\Controllers\Shop;

use App\Containers\ShopSection\CartItem\Actions\GenerateCartItemAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\AddToCartRequest;
use App\Models\Product;
use App\Models\Shop\CartItem;
use App\Models\Shop\PurchaseItemDetail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Корзина');

        $frd = app()['cart'];
        dd($frd);

        return view('carts.index',);//compact($frd));
    }

    public function addNewItem(AddToCartRequest $request)
    {


        $productId = $request->input('product_id');

        $product = Product::find($productId);

        if (!app()['cart']->checkInCart($product->getKey())) {
            $cartItem = app(GenerateCartItemAction::class)->run($product);
        }

        return redirect()->route('catalog.index');
    }
}
