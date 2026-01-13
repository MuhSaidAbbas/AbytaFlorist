<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Belum login
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Login tapi bukan admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'AKSES DITOLAK. HANYA ADMIN.');
        }

        return $next($request);
    }
}
