<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\materials;
use App\Models\StockHistory;
use Illuminate\Http\Request;
use Illuminate\Support\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class stock extends Controller
{
    public function index()
    {

        $category = category::get();

        return view('stock', compact('category'));
    }

    public function category()
    {

        $category = DB::table('materials')
            // ->join('suppliers', 'suppliers.id', '=', '.material.id_customer')
            // ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->select(
                DB::raw("SUM(current_stock) as stock"),
                'category',
                'updated_at',
                'qty'
            )
            // ->orderBy('sales.id', 'DESC')
            // ->groupBy('invoices.sales_id')
            ->groupBy('category')
            ->get();

        return view('meatcategory', compact('category'));
    }

    // public function Item()
    // {
    //     dd('category');
    //   $category = category::get();

    //    return view('Items', compact('category'));
    // }

    public function itemin()
    {

        $cate = category::get();

        return view('Items', compact('cate'));
    }

    public function Materials(request $request)
    {

        $material = materials::get();

        return view('materials', compact('material'));
    }

    public function materials_in(request $request)
    {

        $M = materials::insert([

            'product_name' => $request->product_name,
            'supplier_name' => $request->supplier_name,
            'qty' => $request->qty,
            'current_stock' => $request->current_stock,
            'product_cost' => $request->product_cost,
            'category' => $request->category,
            'carcass_qty' => $request->carcass_qty,
            'product_cost' => $request->product_cost,
            'date' => carbon::now(),

        ]);

        return redirect()->back()->with('');
    }

    public function edit($id, request $request)
    {

        $material = materials::find($id);

        return view('materials', compact('material'));
    }

    public function update($id, request $request)
    {
        // dd($id);

        $update_stock = materials::find($id);

        if ($update_stock->current_stock != null || $update_stock->current_stock != "") {
            $update_stock->update([

                'added_stock' => $request->added_stock,
                'current_stock' => $update_stock->current_stock + $request->added_stock,
                'updated_at' => carbon::now(),
                'by' => Auth::user()->name,

            ]);

            StockHistory::create([
                'material_id' => $id,
                'added_qty' => $request->added_stock,
                'current_qty' => $update_stock->current_stock,
                'old_qty' => $update_stock->current_stock,
                'by' => Auth::user()->name,
            ]);
        } else {
            $update_stock->update([

                'added_stock' => $request->added_stock,
                'current_stock' => $update_stock->qty + $request->added_stock,
                'updated_at' => carbon::now(),
                'by' => Auth::user()->name,

            ]);

            StockHistory::create([
                'material_id' => $id,
                'added_qty' => $request->added_stock,
                'current_qty' => $update_stock->current_stock,
                'old_qty' => $update_stock->current_stock,
            ]);
        }

        return redirect('materials')->with('status, Successful Added');
    }

    public function updateOut($id, request $request)
    {
        // dd($id);

        $update_stock = materials::find($id);

        if ($update_stock->current_stock != null || $update_stock->current_stock != "") {
            $update_stock->update([

                'out_stocked' => $request->out_stocked,
                'current_stock' => $update_stock->current_stock - $request->out_stocked,

                'updated_at' => carbon::now(),
                'by' => Auth::user()->name,

            ]);

            StockHistory::create([
                'material_id' => $id,
                'out_qty' => $request->out_stocked,
                'current_qty' => $update_stock->current_stock,
                'old_qty' => $update_stock->current_stock,
                'by' => Auth::user()->name,
            ]);
        } else {
            $update_stock->update([

                'out_stocked' => $request->out_stocked, -'current_stock' => $update_stock->qty - $request->out_stocked,
                'updated_at' => carbon::now(),
                'by' => Auth::user()->name,

            ]);

            if ($update_stock) {
                //add stock history

                StockHistory::create([
                    'material_id' => $id,
                    'out_qty' => $request->out_stocked,
                    'current_qty' => $update_stock->current_stock,
                    'old_qty' => $update_stock->qty,
                    'by' => Auth::user()->name,
                    // 'date'=>carbon::now(),
                ]);
            }
        }

        return redirect('materials')->with('status, Successful Added');
    }

    public function getStockHistory($id)
    {
        $histry = StockHistory::where('material_id', $id)->get();

        return view('stock_history', compact('histry'));
    }
}
