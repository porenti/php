<?php

namespace App\Models\Shop;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\PurchaseItemDetail
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property int $sale
 * @property int $subtotal_amount
 * @property int $amount
 * @property-read Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereSubtotalAmount($value)
 * @mixin \Eloquent
 */
class PurchaseItemDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'sale',
        'subtotal_amount',
        'amount',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getSale(): int
    {
        return $this->sale;
    }

    /**
     * @param int $sale
     */
    public function setSale(int $sale): void
    {
        $this->sale = $sale;
    }

    /**
     * @return int
     */
    public function getSubtotalAmount(): int
    {
        return $this->subtotal_amount;
    }

    /**
     * @param int $subtotal_amount
     */
    public function setSubtotalAmount(int $subtotal_amount): void
    {
        $this->subtotal_amount = $subtotal_amount;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

}
