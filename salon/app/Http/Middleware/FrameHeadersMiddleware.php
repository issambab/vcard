<?php

namespace App\Http\Middleware;

use Closure;

class FrameHeadersMiddleware
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
        $response = $next($request);
     
     $response->header('Access-Control-Allow-Origin', '*')

     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
     //->header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');
     return $response;
    }
}
