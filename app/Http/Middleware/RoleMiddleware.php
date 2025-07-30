<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect('/sesi')->with('error', 'Silakan login terlebih dahulu');
        }
        
        // Cek apakah user memiliki role yang sesuai
        if (auth()->user()->role !== $role) {
            abort(403, 'Akses ditolak. Anda tidak memiliki permission untuk halaman ini.');
        }
        
        return $next($request);
    }
}