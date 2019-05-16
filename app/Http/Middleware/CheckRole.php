<?php

namespace App\Http\Middleware;

use Closure;
use App\Agronomists;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if (! $request->user()->hasRole($role)) {
            abort(401, 'This action is unauthorized.');
        }
        if (trim(parse_url(url()->previous(), PHP_URL_PATH), '/')!=='admin/updateinfo' ) {
            if (Agronomists::where('email', '=', $request->user()->email)->count()>0 ) {
                return $next($request);
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}
