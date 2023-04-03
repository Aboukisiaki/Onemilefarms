<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//     if(Auth::check()){
//         if (Auth::user()->title('Admin')) {
//             return true;
//         }else{
//             return view('Admin');
//         }
//     }else{
//         abort(403, 'Unauthorized action.');
//     }
//     return $next($request);
        // }
    }
}

    // {
    //     if (Auth::check()) {
    //         if (Auth::user()->title == 'Admin') {
    //             return $next($request);
    //         } else {
    //             return view('Admin');
    //         }

//     }

            // else{

//     return redirect('login');
//     }
        // }

        // return $next($request);
