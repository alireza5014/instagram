<?php

namespace App\Http\Middleware;

use Closure;

class Origin
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

//        $allowedOrigins = ['http://localhost:3000', 'localhost:3000', 'localhost'];
//        $origin = $_SERVER['HTTP_ORIGIN'];
//
//        if (in_array($origin, $allowedOrigins)) {
//            return $next($request)
//                ->header('Access-Control-Allow-Origin', $origin)
//                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE,OPTION')
//                ->header('Access-Control-Allow-Headers', 'Content-Type');
//        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');


        return $next($request)
            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE,OPTION')
            ->header('Access-Control-Allow-Headers', 'Content-Type');
        return $next($request);

    }
}
