<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class AuthenticateCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, Closure $next)
    {
        // Check if the user_id exists in the session
        $userId = Session::get('user_id');

        // If no user_id is found in the session, redirect to login
        if (!$userId) {
            return Redirect::route('login')->with('error', 'Please log in to access this page.');
        }

        // Verify that the user_id corresponds to an actual user in the database
        $user = User::find($userId);

        // If the user does not exist, clear the session and redirect to login
        if (!$user) {
            Session::forget('user_id');
            return Redirect::route('login')->with('error', 'Your session has expired. Please log in again.');
        }

        // If the user is authenticated, proceed to the next middleware or controller
        return $next($request);
    }
}