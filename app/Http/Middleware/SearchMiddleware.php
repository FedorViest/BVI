<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchMiddleware
{
    public function handle(Request $request, Closure $next){

        // Clear search_query session parameter when user navigates away from shop page
        if ($request->path() !== 'shop') {
            session()->forget('search_query');
        }

        return $next($request);
    }
}
