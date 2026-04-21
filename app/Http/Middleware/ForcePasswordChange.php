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
        // Cek: Apakah user sudah login?
        // Cek: Apakah bendera must_change_password bernilai true?
        // Cek: Supaya gak looping, jangan hadang kalau dia emang lagi mau ganti password (route profile)
        if (auth()->check() && auth()->user()->must_change_password) {
            $allowedRoutes = [
                'profile.edit',
                'profile.update',
                'logout'
            ];
            if (!in_array($request->route()->getName(), $allowedRoutes)) {
                return redirect()
                    ->route('profile.edit')
                    ->with('error', 'Keamanan: Anda wajib mengganti password default dari Owner sebelum bisa mengakses fitur lain.');
            }
        }

        return $next($request);
    }
}
