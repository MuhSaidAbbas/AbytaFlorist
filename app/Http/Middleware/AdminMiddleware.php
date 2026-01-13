<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        
        // Belum login sama sekali
        if (!session()->has('user_role')) {
            return redirect()->route('admin.login');
        }

        // Sudah login tapi bukan admin
        if (session('user_role') !== 'admin') {
            abort(403, 'Anda tidak memiliki akses admin.');
        }

        // Jika sudah login sebagai admin
        return $next($request);
    }
}
