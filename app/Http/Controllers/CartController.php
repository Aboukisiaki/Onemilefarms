<?php

namespace App\Http\Controllers;

use App\models\sales;
// use App\models\deliveries;
use App\Models\delivery;
//  use Gloudemans\ShoppingCart\Facades\Cart;
use Darryldecode\Cart\CartCondition;
use Darryldecode\Cart\Facades\CartFacade;
// use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;
use Darryldecode\Cart\CartServiceProvider;

use Carbon\Carbon;
use Cookie;
use Darryldecode\Cart\CartCollection;

// <?php namespace Darryldecode\Cart;

use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Darryldecode\Cart\Helpers\Helpers;
use Darryldecode\Cart\Validators\CartItemValidator;
use Darryldecode\Cart\Exceptions\UnknownModelException;


use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Invoices;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // public function img()
    // {




    //    $vars = Invoices::get();
    // //    $a = (int)$invo->unit_price;
    // //    //  $a = 10;
    // //     $b = (int)$invo->quantity;
    //     // $b = 2000;
    //     // $total = $a * $b;




    //     return view('carts', compact('vars'));
    // }




    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('carts', compact('cartItems'));
        // return redirect()->back();

    }


    public function addToCart(Request $request)
    {
        // dd($request->all());
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->sale_price,
            // 'customerId' => $request->customerId,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        // return redirect()->route('cart.list');
        return redirect()->back();
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

        // return redirect()->route('cart.list');
        return redirect()->back();
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->back();
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->back();
    }


    public function checkout(Request $request)
    {

        // return(\Cart::getContent())->toArray();
        // return response()->json(\Cart::getContent());

        // dd($request->all());
        $today = carbon::now();
        $sales = new Sales();
        $sales->created_at = carbon::now()->format('d-m-Y');
        $sales->today = carbon::now()->format('d-m-Y');
        $sales->monthly = Auth::user()->name;
        $sales->customer_id = $request->customerId;
        // $sales->name =  $request->Customer_name;

        if ($sales->save()) {
            foreach (\Cart::getContent() as $data) {
                $item = Items::find($data->id);
                $item->item_qty =  $item->item_qty - $data->quantity;
                $item->save();
                // $update_product_qty = Items::update([
                //     'id' => $data->id,
                //     'item_qty' =>,
                // ]);

                $invoice = new Invoices();
                // $invoice->Customer_name = $data->Customer_name;
                $invoice->sales_id = $sales->id;
                $invoice->product_id = $data->id;
                // $invoice->Customer_phone_no = $data->Customer_phone;
                // $invoice->Customer_email = $data->Customer_email;
                // $invoice->Customer_address = $data->Customer_address;
                // $invoice->rank = $data->Customer_rank;
                $invoice->Company_name = " ONEMILE FARMS";
                $invoice->email = "sales@onemilefarms.co.tz";
                $invoice->address = "P.O.BOX 396";
                $invoice->Comphone_no = "+255752157111";
                $invoice->name = $data->name;
                $invoice->quantity = $data->quantity;
                $invoice->price = $data->price;
                $invoice->total = $data->price * $data->quantity;
                $invoice->status = 'UNPAID';
                $invoice->invoice_no = $data->Invoice_no;
                $invoice->save();
            }

            $delivery = new delivery();
            $delivery->customer_id = $request->customerId;
            $delivery->sale_id = $sales->id;
            $delivery->delivery_date = carbon::now();
            $invoice->descriptions = '';

            if ($delivery->save()) {
                \Cart::clear();
                session()->flash('success', 'Product is Added to Cart Successfully !');
                return redirect()->route('cart');
            }
        }
    }

    public function sales()
    {

        $sales = DB::table('sales')
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->join('items', 'invoices.product_id', '=', 'items.id')
            ->select(
                'sales.*',
                'invoices.*',
                'items.item_name as name',
                'invoices.price as price',
                'invoices.quantity as quantity ',
                'sales.created_at as created_at',
            )
            ->orderBy('sales.id', 'DESC')
            ->get();




        return view('sales', compact('sales'));
    }

    public function pay(request $request, $id)
    {

        $data = Invoices::find($id);

        $data->status = 'PAID';

        $data->save();

        return redirect()->back();
    }
}
