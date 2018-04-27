<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin
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

        if (Auth::user() &&  Auth::user()->admin == true) {
            return $next($request);
        }

        return redirect(route('home'))->with(['message' => 'You do not have sufficient permissions to do that.', 'alert_type' => 'error']);

    }
}
