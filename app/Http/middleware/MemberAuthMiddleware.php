<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemberAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('member_id')) {
            return redirect('/login')->with('error', 'Please log in first.');
        }

        return $next($request);
    }
}
