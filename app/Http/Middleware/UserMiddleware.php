<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah login dan memiliki role user
        if (auth()->user() && auth()->user()->role === 'user') {
            return $next($request);
        }

        // Jika bukan user, arahkan ke halaman utama atau halaman lainnya
        return redirect('/');
    }
}
