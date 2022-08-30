<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\AddressRegion
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion whereName($value)
 * @mixin \Eloquent
 */
class AddressRegion extends Model
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
