<?php

/**
 * Location: /app/Http/Middleware
 */
namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        $headers = [
            'Access-Control-Allow-Origin'      => '*',
            'Access-Control-Allow-Credentials' => 'true',
        ];
        $cors_headers = [
            'Access-Control-Allow-Methods'     => 'GET,HEAD,PUT,POST,DELETE,PATCH',
            'Access-Control-Max-Age'           => '86400',
            'Access-Control-Allow-Headers'     => 'Authorization,Content-Type,X-Requested-With'
        ];

        if ($request->isMethod('OPTIONS'))
        {
            return response()->json(['method' => 'OPTIONS'], 200, $headers + $cors_headers);
        }

        $response = $next($request);

        if (!$response->exception) {
            foreach ($headers as $key => $value) {
                $response->header($key, $value);
            }
            return $response;
        } else {
            $error_data = [
                'error' => true,
                'code' => $response->exception->getCode(),
                'message' => $response->exception->getMessage()
            ];
            return response()->json($error_data, 500, $headers);
        }
    }
}
