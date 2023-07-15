<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ini versi paling simple 
        if (auth()->guest() || auth()->user()->username !== 'javakanaya') { // kalau dia belum login atau kalau dia login, tapi user nya bukan javakanaya
            // kasih pesan 403: forbidden
            abort(403);
        }
        return $next($request);
    }
}