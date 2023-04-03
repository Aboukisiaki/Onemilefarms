<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Carbon\Carbon;

class CategoryController extends Controller


{
    public function category()
    {

        $category = category::get();


        return view('category', compact('category'));
    }

    public function category_insert(request $request)
    {

        $categories = category::insert([

            'name' => $request->name,
            'created_at' => Carbon::now(),





        ]);


        return redirect()->back();
    }

    public function destroy($id)
    {


        $category = category::find($id)->delete();


        return redirect()->back();
    }
}
