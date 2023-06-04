<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIp
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userIp = request()->ip();
        $userCountry = geoip()->getLocation($userIp)->country;

        if ($userCountry == 'Israel') {
            abort(403, "You are restricted to access the site from {$userCountry}.");
        }
  
        return $next($request);
    }
}
