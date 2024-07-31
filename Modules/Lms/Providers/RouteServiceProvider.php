<?php

namespace Modules\Lms\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Lms\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
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
        $this->mapAdminRoutes();
        $this->mapUserRoutes();
        $this->mapWebRoutes();
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
            ->namespace($this->moduleNamespace)
            ->group(module_path('Lms', '/Routes/web.php'));
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
            ->namespace($this->moduleNamespace)
            ->group(module_path('Lms', '/Routes/api.php'));
    }

    protected function mapUserRoutes()
    {
        Route::middleware(['web','auth.user'])
            ->namespace($this->moduleNamespace)
            ->name('user')
            ->prefix('panel')
            ->group(module_path('Lms', '/Routes/user.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web','auth.admin'])
            ->namespace($this->moduleNamespace."\admin")
            ->name('admin.course.')
            ->prefix('f/course')
            ->group(module_path('Lms', '/Routes/admin.php'));
    }
}
