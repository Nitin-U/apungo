<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user is Admin User
        if (Auth::check() && Auth::user()->user_type === 'admin') {
            return $next($request);
        }

        // Redirect back with an error message if the user is not admin
        Session::flash(ERROR, 'You are not authorized to access this page.');
        return redirect()->back();
    }
}
