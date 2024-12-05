<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!isset(Auth::user()->active)){
            return $next($request);
        }
        if(Auth::user()->active ==1){
            return $next($request);
        }
        return redirect('/login')->with('message', 'bạn đã bị ban!');;
       
    }
}
