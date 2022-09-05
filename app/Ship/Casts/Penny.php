<?php

namespace App\Ship\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Penny implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return round($value / 100,2);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        $value = (float) str_replace(',','.',$value);
        $value = (int) round($value * 100);
        return  $value;
    }
}
