<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\AddressHouse
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse whereName($value)
 * @mixin \Eloquent
 */
class AddressHouse extends Model
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
