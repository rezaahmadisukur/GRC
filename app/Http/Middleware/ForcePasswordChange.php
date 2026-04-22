<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->must_change_password) {
            // Nama route baru yang akan kita buat nanti
            $allowedRoutes = [
                'password.force-change', // Halaman form ganti password
                'password.force-update', // Proses simpan passwordnya
                'logout'                 // Biar dia tetep bisa logout kalau gak jadi ganti
            ];

            if (!in_array($request->route()->getName(), $allowedRoutes)) {
                return redirect()
                    ->route('password.force-change')
                    ->with('error', 'Pembaruan Keamanan: Silakan ganti password Anda.');
            }
        }

        return $next($request);
    }
}
