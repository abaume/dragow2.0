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
        Route::prefix('users')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/users.php'));

        Route::prefix('guilds')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/guilds.php'));

        Route::prefix('breeding')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/breeding.php'));

        Route::prefix('colors')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/colors.php'));

        Route::prefix('contests')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/contests.php'));

        Route::prefix('dragons')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/dragons.php'));

        Route::prefix('races')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/races.php'));

        Route::prefix('totems')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/totems.php'));

        Route::prefix('participation')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/participation.php'));

        Route::prefix('appearances')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/appearances.php'));
    }
}
