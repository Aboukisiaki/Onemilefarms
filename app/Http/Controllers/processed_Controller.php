<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processed;
use Illuminate\Support\carbon;

class processed_Controller extends Controller
{
    public function process(request $request){

        $process = Processed::insert([

         'item_name'=>$request->item_name,
         'item_code'=>$request->item_code,
         'current_stock'=>$request->current_stock,
         'item_image'=>$request->item_image,
         'date'=>Carbon::now(),
         'expire_date'=>$request->expire_date





         ]);

             return redirect('',compact('process'))->back();
     }



                    public function proccessed(){

                     $processin = Processed::get();


                        return view('Processed_stock', compact('processin'));
                    }


                    // public function update(request $request, $id){

                    //     $processin = Processed::find($id)->update([

                    //         'item_name'=>$request->item_name,
                    //         'item_code'=>$request->item_code,
                    //         'current_stock'=>$request->current_stock,
                    //         'item_image'=>$request->item_image,
                    //         'date'=>Carbon::now(),
                    //         'expire_date'=>$request->expire_date


                    //     ]);


                    //        return view('Processed_stock', compact('processin'));
                    //    }


}







