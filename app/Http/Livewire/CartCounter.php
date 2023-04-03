<?php

namespace App\Http\Livewire;
use Gloudemans\ShoppingCart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {

        $cartcounter = cart::content()->count();
        return view('livewire.cart-counter', compact('cartcounter'));
    }
}
