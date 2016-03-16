<?php

namespace App\Core\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

                switch($guard)
                {
                    case 'admin':
                        $path = 'admin/auth';
                        break;
                    default:
                        $path = 'user/auth';
                        break;
                    default:
                        $path = 'collaborator/auth';
                        break;
                }
                return redirect()->guest($path);
            }
        }
        return $next($request);
    }
}
