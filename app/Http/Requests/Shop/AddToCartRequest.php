<?php

namespace App\Http\Requests\Shop;

use App\Containers\ShopSection\CartItem\Data\Rules\MaxCartItemQuantityRule;
use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function rules(): array
    {
        // max/min quantity validation
        return [
            'product_id' => [
                'required',
                'exists:products,id',
                'min:1',
                new MaxCartItemQuantityRule
            ],
        ];
    }
}
