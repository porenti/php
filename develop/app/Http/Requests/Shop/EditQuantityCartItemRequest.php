<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class EditQuantityCartItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
            'cart_item_id' => 'required|exists:cart_items,id'
        ];
    }
}
