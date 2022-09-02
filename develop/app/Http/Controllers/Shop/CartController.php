<?php

namespace App\Http\Controllers\Shop;

use App\Containers\ShopSection\CartItem\Actions\GenerateNewCartItemAction;
use App\Events\CartItemAddedEvent;
use App\Events\CartItemQuantityChangedEvent;
use App\Events\CartItemRemovedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\AddToCartRequest;
use App\Http\Requests\Shop\EditQuantityCartItemRequest;
use App\Models\Product;
use App\Models\Shop\CartItem;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Корзина');

        $cart = app()['cart']->getCart();

        $cartItems = $cart
            ->cartItems()
            ->with(['product'])
            ->get();


        return view('carts.index', compact('cartItems', 'cart'));
    }

    public function addNewItem(AddToCartRequest $request)
    {

        $productId = $request->input('product_id');

        $product = Product::find($productId);

        if (!app()['cart']->checkInCart($product->getKey())) {
            $cartItem = app(GenerateNewCartItemAction::class)->run($product);
            event(new CartItemAddedEvent($cartItem));
        }


        return redirect()->route('catalog.index');
    }

    public function editQuantityCartItem(EditQuantityCartItemRequest $request)//EditQuantityCartItemRequest
    {
        $cartItemKey = $request->input('cart_item_id');
        $quantity = $request->input('quantity');

        $cartItem = CartItem::where('id', $cartItemKey)->first();
        $cartItem->setQuantity($quantity);
        $cartItem->save();

        event(new CartItemQuantityChangedEvent($cartItem));

        return redirect()->route('shop.cart.index');
    }

    public function removeItem(Request $request)
    {
        $cart = app()['cart']->getCart();
        $productKey = $request->input('cart_item_id');

        $cartItem = $cart
            ->cartItems()
            ->where('id', $productKey)
            ->first();


        $cartItem->delete();

        event(new CartItemRemovedEvent($cart));

        return redirect()->route('shop.cart.index');
    }
}
