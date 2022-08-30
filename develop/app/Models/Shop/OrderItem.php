<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $cart_item_id
 * @property int $purchase_item_detail_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Shop\CartItem $cartItem
 * @property-read \App\Models\Shop\Order $order
 * @property-read \App\Models\Shop\PurchaseItemDetail $purchaseItemDetail
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCartItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem wherePurchaseItemDetailId($value)
 * @mixin \Eloquent
 */
class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'cart_item_id',
        'purchase_item_detail_id',
    ];

    public function cartItem(): BelongsTo
    {
        return $this->belongsTo(CartItem::class);
    }

    public function getCartItem(): CartItem
    {
        return $this->cartItem;
    }

    public function purchaseItemDetail(): BelongsTo
    {
        return $this->belongsTo(PurchaseItemDetail::class);
    }

    public function getPurchaseItemDetail(): PurchaseItemDetail
    {
        return $this->purchaseItemDetail;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $order_id
     */
    public function setOrderId(int $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return int
     */
    public function getCartItemId(): int
    {
        return $this->cart_item_id;
    }

    /**
     * @param int $cart_item_id
     */
    public function setCartItemId(int $cart_item_id): void
    {
        $this->cart_item_id = $cart_item_id;
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
