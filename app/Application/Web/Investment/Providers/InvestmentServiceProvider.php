<?php
namespace App\Application\Web\Investment\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class InvestmentServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Application\Web\Investment\Http\Controllers';
    protected $path      = 'Application/Web/Investment/Http/Routes/';
    protected $prefix    = 'investment';


    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', $this->prefix);
    }


    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace, 'prefix' => $this->prefix,'as' => $this->prefix.'.', 'middleware' => ['web'] ], function ($router) {

            require app_path($this->path.'routes.php');

        });
    }
}
