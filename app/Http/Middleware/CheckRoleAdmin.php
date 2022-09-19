<?php

namespace App\Http\Middleware;


use Closure;

class CheckRoleAdmin
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
        if ($request->user()->role !== 'admin' ) {
            return abort(503, 'Admin Page !! Anda tidak memiliki hak akses');
        }
        return $next($request);
        // dd($request->user()->role !== 'kelurahan');
    }
}
