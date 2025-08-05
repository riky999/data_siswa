<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect('/sesi')->with('error', 'Silakan login terlebih dahulu');
        }

        // Cek apakah user memiliki salah satu role yang diperbolehkan
        // if (!in_array(auth()->user()->role, $roles)) {
        //     abort(403, 'Akses ditolak. Anda tidak memiliki permission untuk halaman ini.');
        // }

        return $next($request);
    }
}
