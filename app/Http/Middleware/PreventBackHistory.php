<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PreventBackHistory{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $response = $next($request);

        if(is_a($response,StreamedResponse::class) || is_a($response, BinaryFileResponse::class))  // Don't add headers on StreamedResponses
            return $response;

        return $response->header('Pragma','no-cache')
            ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT')
            ->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
    }
}
