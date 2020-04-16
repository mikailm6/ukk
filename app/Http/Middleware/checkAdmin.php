<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkAdmin
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
        $level = Auth::user()['level']; 
        if (Auth::check()) {
            if ($level != 1) {
                return redirect(route('dashboard'))->with(['alert' => 'User Are Not Admin. Only Admin Are Allowed']);
            }
        }
        return $next($request);
    }
}
