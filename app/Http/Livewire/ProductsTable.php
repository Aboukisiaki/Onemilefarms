<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\ShoppingCart\Facades\Cart;
use App\Models\Product;
use App\Models\Items;

class ProductsTable extends Component
{
    // public $var;
    // Public array quantity=[];

    public function render()
    {
        $product=ProductsTable::get();
        $cart=Cart::content();

        return view('livewire.products-table', compact('products', 'cart'));
    }

    public function storeCart($id)
    {
        $var =Items::findorFail($id);

        Cart::add(
            $var->id,
            $var->item_name,
            $this->input('cart_qty')[$id],
            $var->price
        );

        return redirect('cart')->with('status', 'Added to Cart successfully');
    }


    // Public function mount(){

    //     $this->var= Items::get();

    //     foreach($this->var as var){

    //         $this->quantity[$var->id]=1;
    //     }

    }





