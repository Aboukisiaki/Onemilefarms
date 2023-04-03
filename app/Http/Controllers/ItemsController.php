<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customers;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use App\Models\Items;

use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Darryldecode\Cart\Helpers\Helpers;
use Darryldecode\Cart\Validators\CartItemValidator;
use Darryldecode\Cart\Exceptions\UnknownModelException;

class ItemsController extends Controller
{
    public function item()
    {
        $cate = Category::get();
        return view('items',compact('cate'));
    }


    public function itemin(request $request)
    {
        // $Items->item_name = 'item_name',
        $file = $request->file('image');
        $destinationpath = 'assets/images/';
        $filename = $file->getClientOriginalName();

        $file->move($destinationpath, $filename);


        $Items = new Items();
        $Items->item_name = $request->item_name;
        $Items->item_code = $request->item_code;
        $Items->profit = $request->sale_price - $request->product_cost;
        $Items->item_qty = $request->item_qty;
        $Items->kg_mgr = $request->kg_mgr;
        $Items->image = $request->image;
        $Items->Category = $request->Category;
        $Items->sale_price = $request->sale_price;
        $Items->product_cost = $request->product_cost;
        $Items->name = $filename;
        $Items->path = $destinationpath;


        $Items->save();


        return redirect()->back();
    }


    public function alert()
    {

        $lowstock = Items::where('item_qty','<=', '10')->get();

        return view('lowstock', compact('lowstock',));
    }

    // public function storeCart(Request $request)
    // {
    //     $var =Items::findorFail($request->input('id'));

    //     Cart::add(
    //         $var->id,
    //         $var->item_name,
    //         $request->input('cart_qty'),
    //         $var->price
    //     );

    //     return redirect('cart')->with('status', 'Added to Cart successfully');
    // }

    public function after()
    {
        $items = Items::get();
        return view('stock_after', compact('items'));
    }

    public function show()
    {
        $customers = Customers::get();
        $items = Items::get();
        $cartItems = \Cart::getContent();
        // $items = Items::get()->paginate(5);
        // $cart = Cart::content();



        return view('cart', compact('items', 'cartItems', 'customers'));
    }

    // public function checkout(){

    //     $cart=Cart::where('user_id',auth()->id())->get();

    // foreach ($cart as $cartProducts) {
    //     $var=Items::find($cartProducts->id);

    //     if (!$var|| $var->item_qty<$cartProducts->qty) {
    //         $this->check_out_message =' Error: product not found in stcok';
    //     }










    // public function search(){

    //     $search = request()->query('search');

    //     if($search){

    //         // $post= Items::where('item_name', 'LIKE',  "%($search)%");
    //     }
    // $vars= Items::get();

    //     return view('cart', compact('vars',))
    //     // ->with('item_name',Items::get())->with('item_name',$post);





    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('carts', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        dd($request->all());
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'customerId' => $request->customerId,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully!!');

        return redirect()->route('cart.list');
    }

    // public function updatestock()
    // {
    //     return view('updatestock');
    // }

    public function updatestock1($id)
    {
        $items = Items::find($id);

        return view('updatestock', compact('items'));
    }


    public function update1(Request $request, $id)


    {


        $items =  Items::find($id)->update([

            'item_name' => $request->item_name,

            'item_qty' => $request->item_qty,

            'item_price' => $request->price,


        ]);

        return redirect()->route('stock_after', compact('items'));
    }
}
