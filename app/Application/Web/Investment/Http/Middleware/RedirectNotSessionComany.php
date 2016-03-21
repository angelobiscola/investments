<?php
namespace App\Application\Web\Investment\Http\Middleware;


use Closure;

class RedirectNotSessionComany
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

            if(is_null(session('company')))
            {
                return redirect(route('collaborator.home.company'));
            }

        return $next($request);
    }
}
