<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isPemilik
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'pemilik') {
            return redirect('/login')->with('errors', 'Anda Harus Login Terlebih dahulu');
        }
        return $next($request);
    }
}
