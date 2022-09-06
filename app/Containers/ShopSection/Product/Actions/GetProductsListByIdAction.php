<?php

namespace App\Containers\ShopSection\Product\Actions;

use App\Containers\ShopSection\Product\Data\Repositories\ProductItemRepository;
use App\Models\Product;

class GetProductsListByIdAction
{

    public function run(string $productId, array $columns = ['*'], array $with = []): Product
    {
        return app(ProductItemRepository::class)
            ->getListById($productId, $columns, $with);
    }

}