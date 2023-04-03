<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use DataTables;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class UserController extends Controller
{
    public function Users()
    {
        $users=User::get();


        // $users=User::Paginate(5)->get();

        return view('users', compact('users'));
    }

    public function delete($id)
    {
        $users=User::find($id)->delete();


        // $users=User::Paginate(5)->get();

        return redirect()->back();;
    }

     public function set(Request $request )
     {
        $data = User::latest()->get();
         return view('settings',compact('data'));
     }

    public function set2(Request $request )
    {
    //   if ($request->ajax()) {
            $data = User::latest()->get();

         return view('settings',compact('data'));
    }

    public function Roles(request $request)
    {
        // //  dd($request->all());
        //  $data=array();
        //  $data['name']=$input->name;
        //  $data['email']=$input->email;
        // $data['password']=bcrypt($input->password);
        // $data['title']=$request->title;
        // $data['phone_no']=$request->phone_no;
        // // $data['address']=$request->address;
        // // $data['patient_list']=$request->patient_list;
        // // $data['make_appointment']=$request->make_appointment;
        // // $data['appointment']=$request->appointment;
        // // $data['doctor']=$request->doctor;
        // // $data['cancled_appointments']=$request->cancled_appointments;
        // // $data['role_writer']=$request->role_writer;
        // // $data['patient_cancelation']=$request->patient_cancelation;
        // // $data['doctor_cancelation']=$request->doctor_cancelation;
        // // $data['all_appointments']=$request->all_appointments;
        // // $data['my_calendar']=$request->my_calendar;
        // // $data['my_appointments']=$request->my_appointments;
        // // $data['doctor_time_table']=$request->	doctor_time_table;
        // // $data['users']=$request->users;
        // // $data['type']=0;
        // // $data['created_at']=Carbon::now();

        user::insert([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'title' => $request['title'],
            'created_at'=>Carbon::now()
            // 'created_at'=$request[Carbon::now()],
            // 'speciality' => $request['speciality'],
            // 'phone_no' => $request['phone_no'],
            // 'address' => $request['address'],
        ]);

        // DB::table('users')->insert($data);
        return redirect()->back()->with('success', 'inserted Well done');
    }

    public function permission(){

        // user::find($id);

        return view('permisions');

    }
    public function permissionedit($id){

     $User=user::find($id);

        return view('permisions',compact('User'));

    }

    public function permission2($id, Request $request){
        //   dd($request);

            $users = user::find($id);
            $users->name = $request->name;
            // $User->email = $request->email;
            $users->password =  Hash::make($request['password']);
            $users->title = $request->title;
            $users->items = $request->items;
            $users->operations = $request->operations;
            $users->invoices = $request->invoices;
            $users->suppliers = $request->suppliers;
            $users->incoming_stock = $request->incoming_stock;
            $users->users = $request->users;
            $users->add_category = $request->add_category;
            $users->processed_stock = $request->processed_stock;
            $users->customers = $request->customers;
            $users->meat_category = $request->meat_category;
            $users->inventory = $request->inventory;
            $users->overview = $request->overview;
            $users->sales = $request->sales;
            $users->created_at = Carbon::now();

            ($users->save());

//  return    $User=user::find($id)->update([

//             'name' => $request['name'],
//             'email' => $request['email'],
//             'password' => Hash::make($request['password']),
//             'title' => $request['title'],
//             'items' => $request['items'],
//             'operations' => $request['operations'],
//             'invoices' => $request['invoices'],
//             'supplier' => $request['supplier'],
//             'incoming_stock' => $request['incoming_stock'],
//             'Add_category' => $request['Add_category'],
//             'users' => $request['users'],
//             'inventory' => $request['inventory'],
//             'processed_stock' => $request['processed_stock'],
//             'created_at'=>Carbon::now(),

//         ]);

        return redirect()->route('users')->with('status, Updated Sucessfully');

    }



}
