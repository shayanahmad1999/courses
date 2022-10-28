<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        if(!session()->has('LoggedAdminID') && !Auth::user() && $request->path() != '/home' && $request->path() != '/addAdmin')
        {
        return redirect('/')->with('fail','you must be logged in first');
        }
        if(session()->has('LoggedAdminID') && $request->path() == '/')
        {
            return back();
        }
        return $next($request);
    }
}
