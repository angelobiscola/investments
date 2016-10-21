<?php
namespace App\Application\Web\Collaborator\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class CollaboratorServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Application\Web\Collaborator\Http\Controllers';
    protected $path      = 'Application/Web/Collaborator/Http/Routes/';
    protected $prefix    = 'collaborator';


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
