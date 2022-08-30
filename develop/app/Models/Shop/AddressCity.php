<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\AddressCity
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity whereName($value)
 * @mixin \Eloquent
 */
class AddressCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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

}
