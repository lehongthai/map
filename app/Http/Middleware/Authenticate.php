<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        if (!Auth::check() || Auth::user()->level == 3) {
            Auth::logout();
            $message = ['level' => 'danger', 'flash_message' => 'Tài khoản của khách hàng'];
            return redirect('login')->with($message);
        }
        return $next($request);
    }
}
