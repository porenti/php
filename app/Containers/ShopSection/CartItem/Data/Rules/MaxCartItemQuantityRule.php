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
        $result = false;
        if ($this->quantity === 1){
            $result = true;
        } else {
            $quantity = app(GetProductQuantityByCartItemIdAction::class)->run($value);
            if ($quantity >= $this->quantity) {
                return true;
            }
        }
        return $result;

    }

    public function message()
    {
        // TODO: Implement message() method.
    }
}
