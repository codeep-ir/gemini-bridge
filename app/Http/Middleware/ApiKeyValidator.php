<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $apiKey = $request->header('AHMED-KELID');

        if ($apiKey !== env('API_KEY')) {
            return response()->json(['error' => 'You are unauthorized'], 401);
        }

        return $next($request);
    }
}
