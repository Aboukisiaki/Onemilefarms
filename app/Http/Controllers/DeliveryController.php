<?php

namespace App\Http\Controllers;

use App\Models\delivery;
use App\Models\Invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

 class DeliveryController extends Controller
 {
//    public function showd(){



// return view('delivery_note');

    // }

   public function showd2($id){
    
    $sales = DB::table('sales')
    ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
    ->join('items', 'invoices.product_id', '=', 'items.id')
    ->select(
        'sales.*',
        'sales.*',
        'invoices.*',
        'invoices.id as invId',
        'items.item_name as name',
        'invoices.price as price',
        'invoices.quantity as quantity ',
        'sales.created_at as created_at',
    )
    ->where('sales.id', $id)
    ->orderBy('sales.id', 'DESC')
    ->get();


    $delivery = DB::table('sales')
    ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
    ->join('customers', 'sales.customer_id', '=', 'customers.id')
    ->select(
        'sales.*',
        DB::raw("SUM(invoices.total) as txamount"),
        'invoices.*',
        'invoices.id as invId',
        'customers.phone_no as Customer_phone_no',
        'customers.email as Customer_email',
        'customers.address as Customer_address',
        'customers.Customer_name as CustomerName',
        'customers.Rank as rank ',
        'invoices.Customer_name as Customer_Name ',
        'invoices.email as email ',
        'invoices.Comphone_no as Customer_phone_no ',
        'invoices.Company_name as company_nm ',
        'invoices.name as storeName',
    )
    ->where('sales.id', $id)
    // ->orderBy('sales.id', 'DESC')
    // ->groupBy('invoices.sales_id')
    // ->groupBy('sales.id')
    ->first();


    $data2 = Invoices::find($id);


$pdf = PDF::loadView('delivery_note', compact('sales','delivery'));

return $pdf->stream('document.pdf');



       }

}
