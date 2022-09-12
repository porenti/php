<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Shop\OrderStatusHistory
 *
 * @property int $id
 * @property int $order_id
 * @property int $order_status_id
 * @property string $created_at
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
class OrderStatusHistory extends Pivot
{
    use HasFactory;

    protected $table = 'order_status_histories';
    public $timestamps = false;

    protected $casts = [
        'order_id' => 'int',
        'order_status_id' => 'int'
    ];

    protected $fillable = [
        'order_id',
        'order_status_id',
        'manager_id'
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

    /**
     * @param int $order_id
     */
    public function setOrderId(int $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @param int $order_status_id
     */
    public function setOrderStatusId(int $order_status_id): void
    {
        $this->order_status_id = $order_status_id;
    }


    public function setManagerId(int $id)
    {
        $this->managerId = $id;
    }

    public function getManagerId()
    {
        return $this->managerId;
    }
}
