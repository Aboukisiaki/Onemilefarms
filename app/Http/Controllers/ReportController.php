<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function today()
    {


        $billings = DB::table('sales')
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->where('sales.today', date('d-m-Y'))
            ->select(
                // DB::raw("SUM(invoices.price) as totalprice"),
                'invoices.*',
                'invoices.name as namein',
                'invoices.price as invoiceprice',
                'invoices.quantity as qty',
                'sales.name as sales_name'
            )
            // ->orderBy('sales.id', 'DESC')
            // ->groupBy('invoices.sales_id')
            ->get();
        // dd($billings)->toArray();


        return view('today', compact('billings'));
    }



    public function weekly()
    {

      $billingswwkly = DB::table('sales')
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->where('sales.today', '>=', Carbon::now()->subDays(7)->format('d-m-Y'))
            ->select(
                'sales.*',
                // DB::raw("SUM(invoices.price) as totalprice"),
                'invoices.*',
                'invoices.name as namein',
                'invoices.price as invoiceprice',
                'invoices.quantity as qty',
                'sales.name as sales_name'


            )
            // ->orderBy('sales.id', 'DESC')
            // ->groupBy('invoices.sales_id')
            ->get();

        return view('week', compact('billingswwkly'));
    }


    public function monthly()
    {
        $billingsmonthly = DB::table("sales")
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->select(
                'sales.*',
                // DB::raw("SUM(invoices.price) as totalprice"),
                'invoices.*',
                'invoices.name as namein',
                'invoices.price as invoiceprice',
                'invoices.quantity as qty'

            )
            ->whereBetween('sales.today', [Carbon::now()->startOfMonth()->format('d-m-Y'), Carbon::now()->endOfMonth()->format('d-m-Y')])
            // ->groupBy("price")
            // ->orderBy('price', 'DESC')
            ->get();

        return view('month', compact('billingsmonthly'));
    }

    public function yearly()
    {

        $billingsYear = DB::table("sales")
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->whereBetween('sales.today', [Carbon::now()->startOfYear()->format('d-m-Y'), Carbon::now()->endOfYear()->format('d-m-Y')])
            ->select(
                'sales.*',
                // DB::raw("SUM(invoices.price) as totalprice"),
                'invoices.*',
                'invoices.name as namein',
                'invoices.price as invoiceprice',
                'invoices.quantity as qty'

            )
            // ->groupBy("price")
            // ->orderBy('price', 'DESC')
            ->get();


        return view('year', compact('billingsYear'));


        // $unpaid =  DB::table('Invoices')->where('status', 'UNPAID')->get();

        //      $billings = DB::table('sales')
        //         ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
        //         ->where('sales.today', date('d-m-Y'))
        //         ->select(
        //              DB::raw("SUM(invoices.price) as totalprice"),
        //         )
        //         // ->orderBy('sales.id', 'DESC')
        //         // ->groupBy('invoices.sales_id')
        //         ->first();
        //         // dd($billings)->toArray();






        //     // return Carbon::now()->endOfYear()->format('Y-m-d');
        //     $billingswwkly = DB::table('sales')
        //         ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
        //         ->where('sales.today', '>=', Carbon::now()->subDays(7)->format('d-m-Y'))
        //         ->select(
        //              DB::raw("SUM(invoices.price) as totalprice"),
        //         )
        //         // ->orderBy('sales.id', 'DESC')
        //         // ->groupBy('invoices.sales_id')
        //         ->first();

        //         // return Carbon::now()->endOfWeek()->format('d-m-Y');

        //         // = DB::table("sales")
        //         // ->select(
        //         //     DB::raw('SUM(price) as totalprice')
        //         // )
        //         // ->whereBetween('today', [Carbon::now()->startOfWeek()->format('Y-m-d'), Carbon::now()->endOfWeek()->format('Y-m-d')])
        //         // ->groupBy("price")
        //         // ->orderBy('price', 'DESC')
        //         // ->get();

        //     $billingsmonthly = DB::table("sales")
        //     ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
        //         ->select(
        //             DB::raw('SUM(invoices.price) as totalprice')
        //         )
        //         ->whereBetween('sales.today', [Carbon::now()->startOfMonth()->format('d-m-Y'), Carbon::now()->endOfMonth()->format('d-m-Y')])
        //         // ->groupBy("price")
        //         // ->orderBy('price', 'DESC')
        //         ->first();

        //     $billingsYear = DB::table("sales")
        //     ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
        //         ->whereBetween('sales.today', [Carbon::now()->startOfYear()->format('d-m-Y'), Carbon::now()->endOfYear()->format('d-m-Y')])
        //         ->select(
        //             DB::raw("SUM(invoices.price) as totalprice"),
        //        )
        //         // ->groupBy("price")
        //         // ->orderBy('price', 'DESC')
        //         ->first();



    }
}
