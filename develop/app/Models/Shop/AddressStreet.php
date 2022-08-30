<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\AddressStreet
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet whereName($value)
 * @mixin \Eloquent
 */
class AddressStreet extends Model
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
