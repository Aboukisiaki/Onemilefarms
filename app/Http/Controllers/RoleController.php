<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function roles()
    {
        if (Auth::user()->title=='Admin' || Auth::user()->title=='Admin') {
            return view('home');
        }

        // if (Auth::user()->title==1) {
            else{

            return view('cart');
        }

    }
}
