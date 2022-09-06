<?php

namespace App\Containers\ShopSection\Product\Data\Repositories;

use App\Models\Product;

class ProductItemRepository
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getListById(string $productId, array $columns = ['*'], array $with = []): Product
    {
        return Product::where('id',$productId)->select($columns)->with($with)->first();
    }
}