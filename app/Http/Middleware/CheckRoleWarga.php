<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleWarga
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
        if ($request->user()->role !== 'warga' ) {
            return abort(503, 'warga Page !! Anda tidak memiliki hak akses');
        }
        return $next($request);
    }
}
