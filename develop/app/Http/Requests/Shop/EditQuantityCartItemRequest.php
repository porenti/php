<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class EditQuantityCartItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
            'CartItemKey' => 'required|exists:cart_items,id'
        ];
    }
}
