<?php


namespace App\Containers\ShopSection\CartItem\Actions;


use App\Containers\ShopSection\CartItem\Data\Repositories\CartItemRepository;
use App\Models\Shop\Cart;
use Illuminate\Support\Collection;

class GetCartItemsListByCartAction
{

    public function run(Cart $cart, array $columns = ['*'], array $with = []): Collection
    {
        return app(CartItemRepository::class)
            ->getListByCart($cart, $columns, $with);

    }

}
