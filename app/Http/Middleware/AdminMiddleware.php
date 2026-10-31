<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin')) {
            // Kalau bukan admin, redirect ke login
            return redirect()->route('login.form')->with('error', 'Anda harus login sebagai admin.');
        }

        return $next($request);
    }
}
