<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFromStart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // Pastikan session TERBENTUK
        if (!$request->session()->get('flow.start_passed', false)) {
            return redirect()->route('start');
        }
        
        return $next($request);
    }
}
