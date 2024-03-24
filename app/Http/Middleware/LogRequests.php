<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Log request information
        $currentTime = now()->toIso8601String();
        $timezone = config('app.timezone');
        $method = $request->method();
        $path = $request->fullUrl();
        $user_email = optional(auth()->user())->email;
        $user_id = optional(auth()->user())->id;
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $requestHeaders = $request->header();
        $requestBody = $request->all();
        $routeName = $request->route()->getName();
        $controllerAction = $request->route()->getActionName();
        $sessionId = session()->getId();
        $responseStatusCode = http_response_code();
        $startTime = microtime(true);
        // Your existing code goes here...
        $endTime = microtime(true);
        $executionTime = round(($endTime - $startTime) * 1000, 2);
        $environment = app()->environment();

        if ($user_email == null){
            $user_email = 'temp user';
        }
        if ($user_id == null){
            $user_id = '';
        }

        $logMessage = "[$currentTime $timezone] [$method] Request from $ip Request to $path by [$user_id $user_email] User Agent: $userAgent, Route: $routeName, Controller Action: $controllerAction, Session ID: $sessionId, Status Code: $responseStatusCode, Execution Time: {$executionTime}ms, Environment: $environment, Request Headers: " . json_encode($requestHeaders) . ", Request Body: " . json_encode($requestBody);
        Log::channel('requests')->info($logMessage);

        return $next($request);
    }
}
