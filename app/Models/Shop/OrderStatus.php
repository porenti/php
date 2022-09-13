<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\OrderStatus
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\OrderStatusHistory[] $order_status_histories
 * @property-read int|null $order_status_histories_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereName($value)
 * @mixin \Eloquent
 * @property string|null $style
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereStyle($value)
 */
class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'order_statuses';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'style'
    ];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function order_status_histories()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(string $style): void
    {
        $this->style=$style;
    }

    /**
     * @return OrderStatusHistory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getOrderStatusHistories(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->order_status_histories;
    }

    /**
     * @param OrderStatusHistory[]|\Illuminate\Database\Eloquent\Collection $order_status_histories
     */
    public function setOrderStatusHistories(\Illuminate\Database\Eloquent\Collection|array $order_status_histories): void
    {
        $this->order_status_histories = $order_status_histories;
    }



}
