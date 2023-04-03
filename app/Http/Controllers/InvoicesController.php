<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
//package
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Mpdf\Utils\PdfDate;
use PDF;


// $customer = new Buyer([
//     'name'          => 'John Doe',
//     'custom_fields' => [
//         'email' => 'test@example.com',
//     ],
// ]);

// $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

// $invoice = Invoice::make()
//     ->buyer($customer)
//     ->discountByPercent(10)
//     ->taxRate(15)
//     ->shipping(1.99)
//     ->addItem($item);

// return $invoice->stream();


class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invo()
    {

       $invo = DB::table('sales')
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->select(
                'sales.*',
                DB::raw("SUM(invoices.total) as txamount"),
                'invoices.*',
                'customers.*',
                'sales.id as salesId',
                'invoices.id as invId',
                'customers.phone_no as Customer_phone_no',
                'customers.email as Customer_email',
                'customers.address as Customer_address',
                'customers.Customer_name as CustomerName',
                'customers.Rank as rank ',
                // 'invoices.Customer_name as Customer_Name ',
                'invoices.email as email ',
                // 'invoices.Comphone_no as Customer_phone_no ',
                'invoices.Company_name as company_name ',
                'invoices.name as storeName',
                
            )
             ->orderBy('sales.id', 'DESC')
            ->groupBy('invoices.sales_id')
            ->groupBy('sales.id')
            ->get();
            // dd($invo);

    //   dd($invo);

        //    $invo = Invoices::get();
        //    $a = (int)$invo->unit_price;
        //    //  $a = 10;
        //     $b = (int)$invo->quantity;
        // $b = 2000;
        // $total = $a * $b;




        return view('Invoices', compact('invo'));
    }

    public function getInvoiceDetails(Request $request)
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
            ->where('invoices.sales_id', $request->id)
            ->orderBy('sales.id', 'DESC')
            ->get();

        $invo = DB::table('sales')
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->select(
                'sales.*',
                DB::raw("SUM(invoices.total) as txamount"),
                'invoices.*',
                'sales.id as salesId',
                'invoices.id as invId',
                'customers.phone_no as Customer_phone_no',
                'customers.email as Customer_email',
                'customers.address as Customer_address',
                'customers.Customer_name as CustomerName',
                'customers.Rank as rank ',
                // 'invoices.Customer_name as Customer_Name ',
                'invoices.email as email ',
                // 'invoices.Comphone_no as Customer_phone_no ',
                'invoices.Company_name as company_name ',
                'invoices.name as storeName',
            )
            ->where('sales.id', $request->id)
            ->first();

        return $response = Response(['items' => $sales, 'customerDetails' => $invo]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(request $id)
    {
        $find = Invoices::find($id)->first();

        return view('invoice', compact('find'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Invoices::insert([

            'Customer_name' => $request->Customer_name,
            'Customer_phone_no' => $request->Customer_phone_no,
            'Customer_email' => $request->Customer_email,
            'Customer_address' => $request->Customer_address,
            'rank' => $request->rank,
            'Company_name' => 'ONEMILE FARMS',
            'email' => 'sales@onemilefarms.co.tz',
            'address' => 'P.O.BOX 396',
            'Comphone_no' => '+255752157111',
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => 'UNPAID',
            'invoice_no' => $request->invoice_no,



        ]);

        return redirect()->back();
    }

    public function show($id)
    {
        // return  $invo = DB::table('sales')
        //     ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
        //     ->join('customers', 'sales.customer_id', '=', 'customers.id')
        //     ->select(
        //         'sales.*',
        //         DB::raw("SUM(invoices.total) as txamount"),
        //         'invoices.*',
        //         'invoices.id as invId',
        //         'customers.phone_no as Customer_phone_no',
        //         'customers.email as Customer_email',
        //         'customers.address as Customer_address',
        //         'customers.Customer_name as CustomerName',
        //         'customers.Rank as rank ',
        //         'invoices.Customer_name as Customer_Name ',
        //         'invoices.email as email ',
        //         'invoices.Comphone_no as Customer_phone_no ',
        //         'invoices.Company_name as company_nm ',
        //         'invoices.name as storeName',
        //     )
        //     ->where('invoices.id', $id)
        //     // ->orderBy('sales.id', 'DESC')
        //     // ->groupBy('invoices.sales_id')
        //     // ->groupBy('sales.id')
        //     ->get();
        // // dd($invo);

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

        $invo = DB::table('sales')
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



        $pdf = PDF::loadView('Invoiceview', compact('sales', 'invo'));

        return $pdf->stream('document.pdf');

        // $pdf = PDF::loadView('Invoiceview', $invo);
        // return $pdf->stream('result.pdf');

        // return view('Invoiceview', compact('invo','sales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function unpaid(Invoices $invoices)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoices)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices)
    {
        //
    }

    public function pay(request $request, $invId)
    {
        $data = DB::table('sales')
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
            ->where('invoices.id', $invId)
            // ->orderBy('sales.id', 'DESC')
            // ->groupBy('invoices.sales_id')
            // ->groupBy('sales.id')
            ->first();

        $data2 = Invoices::find($invId);

        $data2->status = 'PAID';

        if ($data2->save()) {
            $api_key = '<48a8c40076933db5>';
            $secret_key = '<ZjE4NjQxMzBhODIwMmQzNjZjMWE5YjJmODY3YzEyZmM0NzliODI1NDE3Y2U0NjAzYmUyOWE3NWU4ODcxYzVkYg==
                        >';
            $message = 'Habari ' . $data->CustomerName. '.' .'kutoka Onemile, Umefanikiwa kulipia kiasi cha Tsh' . $data->txamount . ',' . 'karibu OneMile Farms';

            $postData = array(
                'source_addr' => 'INFO',
                'encoding' => 0,
                'schedule_time' => '',
                'message' => $message,
                'recipients' => [
                    array('recipient_id' => '1', 'dest_addr' => '+255' . $data->Customer_phone_no),
                ]

            );
            $Url = 'https://apisms.beem.africa/v1/send';

            $ch = curl_init($Url);
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt_array($ch, array(
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Basic ' . base64_encode("48a8c40076933db5:ZjE4NjQxMzBhODIwMmQzNjZjMWE5YjJmODY3YzEyZmM0NzliODI1NDE3Y2U0NjAzYmUyOWE3NWU4ODcxYzVkYg==>"),
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            ));

            $response = curl_exec($ch);

            if ($response === false) {
                echo $response;

                die(curl_error($ch));
            }


            return redirect()->back();
        }
    }
}
