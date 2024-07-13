<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class CheckForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->url('admin/login')){
            if(isset(Auth::guard('admin')->user()->email)){
                return redirect()->route('admins.dashboard');
            }
        }
        else if($request->url('/login')) {
            // If there's a user already authenticated, redirect them to the user dashboard
            if(isset(Auth::guard('user')->user()->email)) {
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
