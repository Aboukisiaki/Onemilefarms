<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $unpaid =  DB::table('Invoices')->where('status', 'UNPAID')->get();

         $billings = DB::table('sales')
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->where('sales.today', date('d-m-Y'))
            ->select(
                 DB::raw("SUM(invoices.price) as totalprice"),
            )
            // ->orderBy('sales.id', 'DESC')
            // ->groupBy('invoices.sales_id')
            ->first();
            // dd($billings)->toArray();


               $users= DB::table('users')->get();



        // return Carbon::now()->endOfYear()->format('Y-m-d');
        $billingswwkly = DB::table('sales')
            ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->where('sales.today', '>=', Carbon::now()->subDays(7)->format('d-m-Y'))
            ->select(
                 DB::raw("SUM(invoices.price) as totalprice"),
            )
            // ->orderBy('sales.id', 'DESC')
            // ->groupBy('invoices.sales_id')
            ->first();

            // return Carbon::now()->endOfWeek()->format('d-m-Y');

            // = DB::table("sales")
            // ->select(
            //     DB::raw('SUM(price) as totalprice')
            // )
            // ->whereBetween('today', [Carbon::now()->startOfWeek()->format('Y-m-d'), Carbon::now()->endOfWeek()->format('Y-m-d')])
            // ->groupBy("price")
            // ->orderBy('price', 'DESC')
            // ->get();

        $billingsmonthly = DB::table("sales")
        ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->select(
                DB::raw('SUM(invoices.price) as totalprice')
            )
            ->whereBetween('sales.today', [Carbon::now()->startOfMonth()->format('d-m-Y'), Carbon::now()->endOfMonth()->format('d-m-Y')])
            // ->groupBy("price")
            // ->orderBy('price', 'DESC')
            ->first();

        $billingsYear = DB::table("sales")
        ->join('invoices', 'sales.id', '=', 'invoices.sales_id')
            ->whereBetween('sales.today', [Carbon::now()->startOfYear()->format('d-m-Y'), Carbon::now()->endOfYear()->format('d-m-Y')])
            ->select(
                DB::raw("SUM(invoices.price) as totalprice"),
           )
            // ->groupBy("price")
            // ->orderBy('price', 'DESC')
            ->first();






        // return $billings->sum('totalprice');
        return view('dashboard', compact('billings', 'billingswwkly','billingsmonthly','billingsYear','unpaid','users'));
    }







    public function logoout()
    {
        Auth::logout();

        return redirect()->route('login')->with('sucess,logout successful');
    }
}
