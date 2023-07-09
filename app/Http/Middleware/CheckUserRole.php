<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Periksa apakah pengguna telah melakukan autentikasi
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Ubah string roles menjadi array
        $allowedRoles = explode('|', $roles);

        // Periksa apakah peran pengguna cocok dengan peran yang diperlukan
        if (!in_array($request->user()->user_role, $allowedRoles)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
