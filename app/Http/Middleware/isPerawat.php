<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isPerawat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Jika BELUM login, redirect ke halaman login
            return redirect()->route('login');
        }

        // 2. Jika sudah login, cek rolenya
        // Ambil role dari session yang disimpan saat login
        $userRole = session('user_role');

        // 3. Bandingkan dengan role yang diizinkan (misal: 1 untuk Administrator)
        // Pastikan nilai '1' ini sesuai dengan idrole di database Anda
        if ($userRole == 3) {
            return $next($request);
        }else{
            return back()->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }
    }
}
