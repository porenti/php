<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\OrderStatusHistory
 *
 * @property int $id
 * @property int $order_id
 * @property int $order_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Shop\Order $order
 * @property-read \App\Models\Shop\OrderStatus $orderStatus
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereOrderStatusId($value)
 * @mixin \Eloquent
 */
class OrderStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'cart_item_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function getOrderStatus(): OrderStatus
    {
        return $this->orderStatus;
    }
}
