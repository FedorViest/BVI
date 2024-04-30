<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $logData = [
            'timestamp' => now()->toIso8601String(),
            'timezone' => config('app.timezone'),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'user_email' => optional(auth()->user())->email ?? 'temp user',
            'user_id' => optional(auth()->user())->id ?? '',
            'ip_address' => $request->ip(),
            'route_name' => $request->route()->getName(),
            'controller_action' => $request->route()->getActionName(),
            'session_id' => session()->getId(),
            'status_code' => http_response_code(),
            'request_headers' => $request->header('User-Agent'),
            'request_body' => $request->all(),
        ];

        // Log the data in JSON format
        $jsonLog = json_encode($logData);

        File::append(storage_path('logs/requests.log'), $jsonLog, PHP_EOL);

        return $next($request);
    }
}
