<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsBanned
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

        if (Auth::user() &&  Auth::user()->banned == false) {
            // User is not banned
            return $next($request);
        }

        return back()->with(['message' => 'You do not have sufficient permissions to do that.', 'alert_type' => 'danger']);

    }
}
