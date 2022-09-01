<?php

namespace App\Http\Controllers\Shop;

use App\Containers\ShopSection\Cart\Actions\CalculatedTotalAmountCartAction;
use App\Containers\ShopSection\Cart\Actions\RecalculateCartAction;
use App\Containers\ShopSection\CartItem\Actions\CalculatedCartItemAction;
use App\Containers\ShopSection\CartItem\Actions\GenerateNewCartItemAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\AddToCartRequest;
use App\Http\Requests\Shop\EditQuantityCartItemRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop\CartItem;
use App\Models\Shop\PurchaseItemDetail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Корзина');
        $cart = app()['cart']->getCart();
        $cartId = $cart->getKey();

        $productsInCarts = $cart->cartItems()
            ->with(['product'])->paginate(12);
        app(RecalculateCartAction::class)->run($cart);
        /*
        $productsInCarts = CartItem::query()
            ->where('cart_id', $cartId)
            ->with(['product'])->paginate(12);

        dd($productsInCarts);*/
        /*
                $products = Product::query()
                    ->whereHas('cartItems', function (Builder $query) {
                        $query->where('cart_id', app()['cart']->getCart()->getKey());
                    })
                    ->with(['category'])
                    ->filter($frd)
                    ->paginate(12);
                dd($products);*/
        //dd($productsInCarts->items()[0]->product()->get()[0]->getImages());//->getImages());
        return view('carts.index', compact('productsInCarts', 'cart'));
    }

    public function addNewItem(AddToCartRequest $request)
    {

        $productId = $request->input('product_id');

        $product = Product::find($productId);

        if (!app()['cart']->checkInCart($product->getKey())) {
            $cartItem = app(GenerateNewCartItemAction::class)->run($product);
        }

        return redirect()->route('catalog.index');
    }

    public function editQuantityCartItem(EditQuantityCartItemRequest $request)//EditQuantityCartItemRequest
    {
        $cartItemKey = $request->input('CartItemKey');
        $quantity = $request->input('quantity');

        $cartItem = CartItem::where('id',$cartItemKey)->first();
        $cartItem->setQuantity($quantity);
        $cartItem->save();
        app(CalculatedCartItemAction::class)->run($cartItem);


        return redirect()->route('shop.cart.index');
    }

    public function removeItem(Request $request)
    {
        $cart = app()['cart']->getCart();
        $cartId = $cart->getKey();
        $productKey = $request->input('ProductKey');
        $cartItem = $cart->cartItems()
            ->where('product_id',$productKey)->first();
        $cartItem->delete();

        return redirect()->route('shop.cart.index');
    }
}
