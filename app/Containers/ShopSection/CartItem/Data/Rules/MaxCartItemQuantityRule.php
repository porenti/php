<?php

namespace App\Containers\ShopSection\CartItem\Data\Rules;

use App\Containers\ShopSection\CartItem\Actions\GetProductQuantityByCartItemIdAction;
use Illuminate\Contracts\Validation\Rule;

class MaxCartItemQuantityRule implements Rule
{
    private int $quantity;

   public function __construct(int $quantity = 1)
   {
       $this->quantity = $quantity;
   }

    public function passes($attribute, $value): bool
    {
        $quantity = app(GetProductQuantityByCartItemIdAction::class)->run($value);
        if ($quantity >= $this->quantity)
        {
            return true;
        } else {
            return false;
        }
        //dd($attribute, $value, $this->quantity, $quantity);

    }

    public function message()
    {
        // TODO: Implement message() method.
    }
}
