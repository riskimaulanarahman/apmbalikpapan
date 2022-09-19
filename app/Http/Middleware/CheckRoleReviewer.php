<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleReviewer
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
        if ($request->user()->role !== 'reviewer' ) {
            return abort(503, 'Reviewer Page !! Anda tidak memiliki hak akses');
        }
        return $next($request);
    }
}
