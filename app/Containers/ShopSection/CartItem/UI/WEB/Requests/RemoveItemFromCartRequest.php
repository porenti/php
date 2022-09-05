<?php

namespace App\Containers\ShopSection\CartItem\UI\WEB\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveItemFromCartRequest extends FormRequest
{
    public function rules(): array
    {

//                        new MaxCartItemQuantityRule
        return [
            'cart_item_id' => 'required|exists:cart_items,id'
        ];
    }
}