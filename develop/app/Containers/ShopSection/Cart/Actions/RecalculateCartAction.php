<?php


namespace App\Containers\ShopSection\Cart\Actions;


use App\Models\Shop\Cart;

class RecalculateCartAction
{
    public function run(Cart $cart): void
    {
        $sale = 0;
        $subtotal = 0;
        $items= $cart->cartItems()->toBase()->get();
        foreach ($items as $item){
            $sale += $item->quantity*$item->sale;
            $subtotal += $item->quantity*$item->subtotal_amount;
        }

        $sum = $cart->cartItems()->sum('amount');


        $cart->setTotalAmount($sum); //общая цена корзины
        $cart->setSubtotalAmount($subtotal); //нормальная цена товаров
        $cart->setTotalSale($sale); //сумма скидки
    }
}
