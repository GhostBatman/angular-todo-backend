<?php

namespace App\Http\Middleware;

use Barryvdh\Cors\Stack\Cors;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\HttpKernel;

class OptionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->method() === 'OPTIONS') {
            //  $app = null;
            //  $app = new Cors($app, array(
            //      // you can use array('*') to allow any headers
            //      'allowedHeaders' => array('*'),
            //      // you can use array('*') to allow any methods
            //      'allowedMethods' => array('*'),
            //      // you can use array('*') to allow requests from any origin
            //      'allowedOrigins' => array('*'),
            //      'exposedHeaders' => false,
            //      'maxAge' => false         ,
            //      'supportsCredentials' => true,
            //  ));
//
            // return $app;

            return response('', 200)
                ->header('Access-Control-Allow-Origin', ' http://loc2.todo.kg')
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'accept, content-type, x-xsrf-token, x-csrf-token');

        }
        return $next($request);
    }
}
