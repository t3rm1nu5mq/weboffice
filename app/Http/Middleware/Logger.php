<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Logger
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
        return $next($request);
    }

    public function terminate ($request, $response) {
        $method = strtoupper($request->method());
        $uri = $request->getPathInfo();
        $ip = $request->ip();
        $query = $request->all();
        if (Auth::check()) {
            $user = Auth::user()->name;
        } else {
            $user = "Nem bejelentkezett";
        }
        $message = [
            'ip' => $ip,
            'user' => $user,
            'method' => $method,
            'url' => $uri,
            'request' => $query
        ];

        Log::info($uri, $message);
    }
}
