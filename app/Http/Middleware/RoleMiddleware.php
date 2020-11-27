<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles_id)
    {
        // if (!$request->user()->userHasRole($role)) {
        //     //abort(403, 'You are not authorized');
        //     return redirect()->route('dashboard');
        // }
        $user = auth()->user();


        foreach ($roles_id as $role_id) {
            if ($user->hasRole($role_id)) {
                return $next($request);
            }
        }

        if (auth()->user()->role_id == 2 || auth()->user()->role_id == 1) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('student_view_announcements');
        }
    }
}
