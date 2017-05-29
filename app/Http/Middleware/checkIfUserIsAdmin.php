<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class checkIfUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->role_id != '2'){


            //Set flash message
            session(['flash_notification'=>['message'=>'Please log in as Admin to access Admin Panel. Thank you.']]);

            //Redirect to Login
            return redirect('login');

        }

        return $next($request);
    }
}
