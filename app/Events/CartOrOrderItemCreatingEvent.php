<?php

namespace App\Events;

use App\Interfaces\Shop\PurchaseItemDetailable;
use App\Models\Product;

class CartOrOrderItemCreatingEvent
{

    private Product $product;
    private PurchaseItemDetailable $purchaseItemDetailable;

    public function __construct(Product $product, PurchaseItemDetailable $purchaseItemDetailable)
    {
        $this->product = $product;
        $this->purchaseItemDetailable = $purchaseItemDetailable;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return PurchaseItemDetailable
     */
    public function getPurchaseItemDetailable(): PurchaseItemDetailable
    {
        return $this->purchaseItemDetailable;
    }
}
