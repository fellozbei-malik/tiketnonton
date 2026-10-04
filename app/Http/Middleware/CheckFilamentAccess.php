<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckFilamentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Dapatkan user yang sedang login
        /** @var \App\Models\User */
        $user = Auth::user();

        // 2. Jika user tidak ada ATAU tidak punya role apapun untuk akses admin
        if (!$user || !$user->hasAnyRole(['admin', 'Super Admin', 'author', 'Blog Author', 'Event Manager', 'Order Manager', 'Customer Support'])) {
            // 3. Tolak akses dan tampilkan halaman error 403 (Forbidden)
            // abort(403, 'ANDA TIDAK MEMILIKI HAK AKSES');
            return redirect()->route('home') ->with('toast', ['message' => 'Anda tidak memiliki akses admin', 'type' => 'danger']);
        }

        return $next($request);
    }
}