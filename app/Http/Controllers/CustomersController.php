<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Support\Carbon;


class CustomersController extends Controller
{

public function view(){

    $cus = customers::get();


    return view('Customers', compact('cus'));
}

public function Cusin(request $request)
{

    $cus=Customers::insert([

        'Customer_name'=>$request->Customer_name,
        'phone_no'=>(int)$request->phone_no,
        'email'=>$request->email,
        'address'=>$request->address,
        // 'address'=>$request->address,
        'rank'=>$request->rank,


    ]);

    return redirect()->back()->with('');

}


}
