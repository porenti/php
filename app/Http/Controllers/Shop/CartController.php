<?php

namespace App\Http\Controllers\Shop;

use App\Containers\ShopSection\Cart\Actions\EditPaymentMethodAction;
use App\Containers\ShopSection\Cart\Actions\EditUserDataAction;
use App\Containers\ShopSection\Order\Actions\CreateOrderAction;
use App\Containers\ShopSection\Cart\Actions\AddCouponAction;
use App\Containers\ShopSection\Cart\Actions\AddDeliveryAction;
use App\Containers\ShopSection\Cart\Actions\EditQuantityCartItemAction;
use App\Containers\ShopSection\Cart\Actions\RemoveCartItemAction;
use App\Containers\ShopSection\Cart\Actions\RemoveCouponAction;
use App\Containers\ShopSection\CartItem\Actions\GenerateNewCartItemAction;
use App\Containers\ShopSection\CartItem\Actions\GetCartItemsListByCartAction;
use App\Containers\ShopSection\Delivery\Actions\GetDeliveryDataAction;
use App\Containers\ShopSection\PaymentMethod\Actions\GetPaymentMethodDataAction;
use App\Containers\ShopSection\Product\Actions\GetProductsListByIdAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\AddToCartRequest;
use App\Http\Requests\Shop\CouponRequest;
use App\Http\Requests\Shop\EditQuantityCartItemRequest;
use App\Models\Shop\Cart;
use App\Models\Shop\PaymentMethod;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $cart = app()['cart']->getCart();
        SEOMeta::setTitle('Корзина');
        /** @var Cart $cart */
        $deliveries = app(GetDeliveryDataAction::class)->run();
        //@TODO facade
        $paymentMethods = app(GetPaymentMethodDataAction::class)->run();
        $cartItems = app(GetCartItemsListByCartAction::class)
            ->run($cart, ['*'], ['product']);

        $coupons = $cart->getCoupons();
        return view('carts.index', compact('paymentMethods','cartItems', 'coupons', 'cart', 'deliveries'));
    }

    public function addNewItem(AddToCartRequest $request)
    {
        $productId = $request->input('product_id');
        $product = app(GetProductsListByIdAction::class)
            ->run($productId);
        if (!app()['cart']->checkInCart($product->getKey())) {
            $cartItem = app(GenerateNewCartItemAction::class)->run($product);
        }

        $response = redirect()->back();

        if ($request->ajax()) {
            $response = response()->json([
                'message' => [
                    'type' => 'success',
                    'text' => 'Товар успешно добавлен',
                    'title' => 'Успешно'
                ]
            ]);
        }
        return $response;
    }

    public function editQuantityCartItem(EditQuantityCartItemRequest $request)//EditQuantityCartItemRequest
    {
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
        $cart = app()['cart']->getCart();
        app(AddCouponAction::class)->run($cart, $couponName);
        return redirect()->route('shop.cart.index');
    }

    public function removeCoupon(CouponRequest $request)
    {
        $couponName = $request->input('coupon_name');
        $cart = app()['cart']->getCart();
        app(RemoveCouponAction::class)->run($cart, $couponName);
        return redirect()->route('shop.cart.index');
    }

    public function editDelivery(Request $request)
    { //TODO Сделать новый реквест
        //TODO сделать отмену способа оплаты
        $cart = app()['cart']->getCart();
        $deliveryId = $request->input('delivery_id');
        app(AddDeliveryAction::class)->run($cart, $deliveryId);
        return redirect()->route('shop.cart.index');
    }

    public function editUserData(Request $request)
    { //TODO Сделать новый реквест
        $frd = $request->input();
        app(EditUserDataAction::class)->run($frd);
        return redirect()->route('shop.cart.index');
    }

    public function editPaymentMethod(Request $request)
    { //TODO Сделать новый реквест
        $cart = app()['cart']->getCart();
        $paymentMethodId = $request->input('payment_method');
        app(EditPaymentMethodAction::class)->run($cart, $paymentMethodId);
        return redirect()->route('shop.cart.index');

    }

    public function createOrder(Request $request)
    { //TODO Сделать новый реквест
        // TODO и проверку на заполнение тут

        $order = app(CreateOrderAction::class)->run(app()['cart']->getCart());
        return redirect()->route('shop.order.index');
    }
}
