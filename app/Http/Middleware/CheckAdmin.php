<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::user()->type == 'user') return redirect('/');


        /*
        Auth::user(); // get current logged in user data
        Auth::id(); // get current logged in user id
        Auth::login($user); // make user logged in "custom authentication"
        Auth::logout() // destroy current session
        Auth::check(); // Check if there any logged in user
        */




        return $next($request);
    }
}
