<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /**
         * SEMENTARA (tanpa authentication)
         * Kita anggap semua user BUKAN admin
         * Supaya bisa ngetes middleware
         */

        return abort(403, 'Akses ditolak. Halaman khusus admin.');
    }
}
