<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login dan memiliki role 'admin'
        if (auth()->user() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Redirect jika bukan admin
        return redirect('/'); // Halaman yang ingin Anda alihkan pengguna non-admin
    }
}

