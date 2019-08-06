<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapWebRoutesAdmin();

        $this->mapWebRoutesBilling();

        $this->mapWebRoutesCashier();

        $this->mapWebRoutesClient();

        $this->mapWebRoutesMaintenance();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapWebRoutesAdmin()
    {
        Route::prefix('admin')
            ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }

    protected function mapWebRoutesBilling()
    {
        Route::prefix('billing')
            ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/billing.php'));
    }

    protected function mapWebRoutesCashier()
    {
        Route::prefix('cashier')
            ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/cashier.php'));
    }

    protected function mapWebRoutesClient()
    {
        Route::prefix('client')
            ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/client.php'));
    }

    protected function mapWebRoutesMaintenance()
    {
        Route::prefix('maintenance')
            ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/maintenance.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
