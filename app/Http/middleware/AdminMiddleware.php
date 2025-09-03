<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Member;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in
        if (!session('member_id')) {
            return redirect('/login')->with('error', 'You must log in first.');
        }

        // Get the logged-in member
        $user = Member::find(session('member_id'));

        // Check if user exists and is an admin
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized. You do not have admin access.');
        }

        // Allow request to proceed
        return $next($request);
    }
}
