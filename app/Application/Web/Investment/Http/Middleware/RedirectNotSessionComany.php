<?php
namespace App\Application\Web\Investment\Http\Middleware;

use App\Domains\Company\Company;

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
            else
            {
                session(['company' => Company::find((session('company')->id))]);
            }

        return $next($request);
    }
}
