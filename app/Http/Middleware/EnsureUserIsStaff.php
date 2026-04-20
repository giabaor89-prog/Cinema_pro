<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Cho phép cả admin và staff (dựa trên cột boolean `is_staff` hoặc helper `isAdmin()`)
        $isStaff = $user->is_staff ?? false;
        if (! $isStaff && ! $user->isAdmin()) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
