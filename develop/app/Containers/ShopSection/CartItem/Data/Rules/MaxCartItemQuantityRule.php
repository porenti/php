<?php

namespace App\Containers\ShopSection\CartItem\Data\Rules;

use Illuminate\Validation\Rule;

class MaxCartItemQuantityRule extends Rule
{

    public function __construct()
    {
    }

    /**
     * @param $attribute
     * @param $value
     *
     *
     * $value - product_id
     */
    public function passes($attribute, $value): bool
    {
        //action на получение количества по id
        //обращение к репозиторию
        //точный запрос на количество

        //result - количесво в базе

        return $value < $result;
    }

}
