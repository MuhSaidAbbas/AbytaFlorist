<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, \Closure $next)
    {
        // Belum login sama sekali
        if (!session()->has('user_role')) {
            return redirect()->route('admin.login');
        }

        // Sudah login tapi bukan user
        if (session('user_role') !== 'user') {
            abort(403, 'Halaman ini khusus user.');
        }

        return $next($request);
    }
}
