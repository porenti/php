<?php

namespace App\Containers\ShopSection\CartItem\Actions;

use App\Containers\ShopSection\CartItem\Data\Repositories\CartItemRepository;

class GetProductQuantityByCartItemIdAction
{
    public function run(int $cartItemId): int
    {
        return app(CartItemRepository::class)
            ->getProductQuantyById($cartItemId);
    }
}