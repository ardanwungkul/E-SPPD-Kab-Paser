<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LevelMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $level = null)
    {
        // Jika belum login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil level user
        $userLevel = Auth::user()->level;

        // Jika diberikan parameter level dan user tidak sesuai
        if ($userLevel < $level) {
            throw ValidationException::withMessages([
                'level' => ['Anda tidak memiliki akses ke halaman ini.']
            ]);
        }

        return $next($request);
    }
}
