<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\AddressCountry
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry whereName($value)
 * @mixin \Eloquent
 */
class AddressCountry extends Model
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
