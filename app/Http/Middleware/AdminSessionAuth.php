<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSessionAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika tidak ada session 'admin_logged_in', tendang ke login
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('login')->withErrors(['login_error' => 'Silakan login terlebih dahulu.']);
        }

        return $next($request);
    }
}