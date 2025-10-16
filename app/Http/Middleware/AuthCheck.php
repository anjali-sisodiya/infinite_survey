<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // User is logged in, redirect them to a different page or route.
            return redirect('/addproduct'); // Change '/addproduct' to your desired URL.
        } else {
            // User is not logged in, allow the request to proceed.
            return $next($request);
        }
    }
    
}
