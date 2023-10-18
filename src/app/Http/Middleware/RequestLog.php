<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class RequestLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Parameters', ['path' => $request->path(), 'query' => $request->query(), 'input' => $request->input()]);
        $resonse = $next($request);
        Log::info('Status', ['status' => $resonse->status()]);
        return $resonse;
    }
}
