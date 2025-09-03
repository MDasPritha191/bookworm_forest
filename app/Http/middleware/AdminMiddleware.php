<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Member;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('member_id')) {
            return redirect('/login')->with('error', 'You must log in first.');
        }

        $user = Member::find(session('member_id'));

        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized. You do not have admin access.');
        }

        return $next($request);
    }
}
