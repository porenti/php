<?php

namespace App\Http\Controllers\Shop;

use App\Containers\ShopSection\Cart\Actions\EditQuantityCartItemAction;
use App\Containers\ShopSection\Cart\Actions\RemoveCartItemAction;
use App\Containers\ShopSection\CartItem\Actions\GenerateNewCartItemAction;
use App\Containers\ShopSection\CartItem\Actions\GetCartItemsListByCartAction;
use App\Containers\ShopSection\CartItem\Data\Repositories\CartItemRepository;
use App\Containers\ShopSection\Product\Actions\GetProductsListByIdAction;
use App\Events\CartItemAddedEvent;
use App\Events\CartItemQuantityChangedEvent;
use App\Events\CartItemRemovedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\AddToCartRequest;
use App\Http\Requests\Shop\CouponRequest;
use App\Http\Requests\Shop\EditQuantityCartItemRequest;
use App\Models\Product;
use App\Models\Shop\CartItem;
use App\Models\Shop\Coupon;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        SEOMeta::setTitle('Корзина');

        $cart = app()['cart']->getCart();
        $cartItems = app(GetCartItemsListByCartAction::class)
            ->run($cart, ['*'], ['product']);

        return view('carts.index', compact('cartItems', 'cart'));
    }

    public function addNewItem(AddToCartRequest $request)
    {

        $productId = $request->input('product_id');
//action - repository
        $product = app(GetProductsListByIdAction::class)
            ->run($productId);
        if (!app()['cart']->checkInCart($product->getKey())) {
            $cartItem = app(GenerateNewCartItemAction::class)->run($product);
        }


        return redirect()->route('catalog.index');
    }

    public function editQuantityCartItem(EditQuantityCartItemRequest $request)//EditQuantityCartItemRequest
    {
        dd('reqest', $request);
        $cartItemKey = $request->input('cart_item_id');
        $quantity = $request->input('quantity');

        app(EditQuantityCartItemAction::class)->run($cartItemKey, $quantity);

        return redirect()->route('shop.cart.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     *
     *
     *
     * @TODO в реквесте сделать валидацию на наличие cart_items-а (также как с продуктах)
     */
    public function removeItem(Request $request)
    {
        $cart = app()['cart']->getCart();

        $cartItemId = $request->input('cart_item_id');

        app(RemoveCartItemAction::class)->run($cartItemId, $cart);


        return redirect()->route('shop.cart.index');
    }

    public function addCoupon(CouponRequest $request) //CouponRequest
    {
        $couponName = $request->input('coupon_name');
        $coupon = Coupon::where('name', $couponName)->first();
        dd($coupon);
    }
}
