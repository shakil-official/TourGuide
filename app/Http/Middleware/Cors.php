<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
      // header("Access-Control-Allow-Origin: *");
      //   header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT');
      //   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization, X-CSRF-Token');
      //   header('Access-Control-Allow-Credentials: true');
      // if ($request->isMethod('options')) {
      //      return response('', 200)
      //        ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
      //        ->header('Access-Control-Allow-Headers', 'accept, content-type,
      //          x-xsrf-token, x-csrf-token'); // Add any required headers here
      //  }
        //return $next($request);
        return $next($request)
             ->header('Access-Control-Allow-Origin', '*')
             ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
             ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
