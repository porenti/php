<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\Order
 *
 * @property int $id
 * @property int $cart_id
 * @property int $purchase_detail_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Shop\Cart $cart
 * @property-read \App\Models\Shop\PurchaseDetail $purchaseDetail
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePurchaseDetailId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'purchase_detail_id',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function purchaseDetail(): BelongsTo
    {
        return $this->belongsTo(PurchaseDetail::class);
    }
    public function getPurchaseDetail(): PurchaseDetail
    {
        return $this->purchaseDetail;
    }

    /**
     * @return int
     */
    public function getCartId(): int
    {
        return $this->cart_id;
    }

    /**
     * @param int $cart_id
     */
    public function setCartId(int $cart_id): void
    {
        $this->cart_id = $cart_id;
    }

    /**
     * @return int
     */
    public function getPurchaseDetailId(): int
    {
        return $this->purchase_detail_id;
    }

    /**
     * @param int $purchase_detail_id
     */
    public function setPurchaseDetailId(int $purchase_detail_id): void
    {
        $this->purchase_detail_id = $purchase_detail_id;
    }


}
