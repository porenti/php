<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\CartItem
 *
 * @property int $id
 * @property int $cart_id
 * @property int $purchase_item_detail_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Shop\Cart $cart
 * @property-read \App\Models\Shop\PurchaseItemDetail $purchaseItemDetail
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem wherePurchaseItemDetailId($value)
 * @mixin \Eloquent
 */
class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'purchase_item_detail_id',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function purchaseItemDetail(): BelongsTo
    {
        return $this->belongsTo(PurchaseItemDetail::class);
    }

    public function getPurchaseItemDetail(): PurchaseItemDetail
    {
        return $this->purchaseItemDetail;
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
    public function getPurchaseItemDetailId(): int
    {
        return $this->purchase_item_detail_id;
    }

    /**
     * @param int $purchase_item_detail_id
     */
    public function setPurchaseItemDetailId(int $purchase_item_detail_id): void
    {
        $this->purchase_item_detail_id = $purchase_item_detail_id;
    }

}
