<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Items;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;

class search extends Controller
{
    public function search(Request $request){
        $customers= Customers::get();
        // $cartItems= cart::get();
        $cartItems = \Cart::getContent();
        // Get the search value from the request
     $search = $request->input('search');

        // Search in the title and body columns from the posts table
    $items = Items::query()
            ->where('item_name', 'LIKE', "%{$search}%")
            ->orWhere('item_code', 'LIKE', "%{$search}%")
            ->get();
// customer search
            $customers = Customers::query()
            ->where('Customer_name', 'LIKE', "%{$search}%")
            ->orWhere('rank', 'LIKE', "%{$search}%")
            ->get();


        // Return the search view with the resluts compacted
        return view('cart', compact('items','customers','cartItems'));
    }
}
