<?php

namespace App\Http\Requests\Shop;

use App\Containers\ShopSection\CartItem\Data\Rules\MaxCartItemQuantityRule;
use Illuminate\Foundation\Http\FormRequest;

class EditQuantityCartItemRequest extends FormRequest
{
    public function rules(): array
    {
//                        new MaxCartItemQuantityRule
        return [
            'quantity' => ['required','integer','min:1',],
            'cart_item_id' => ['required','exists:cart_items,id', new MaxCartItemQuantityRule($this->input('quantity'))]

        ];
    }
}
