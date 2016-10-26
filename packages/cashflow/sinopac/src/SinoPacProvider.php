<?php

namespace Cashflow\SinoPac;

use Illuminate\Support\ServiceProvider;

class SinoPacProvider extends ServiceProvider
{
    protected $namespace = 'Cashflow\SinoPac';
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__.'/views', 'sinopac');
        $this->publishes([
          __DIR__.'/views' => base_path('resources/views/vendor/cashflow/sinopac'),
          __DIR__.'/config/sinopac.php' => config_path('sinopac.php'),
        ], 'sinopac');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mapCreditRoutes();
        $this->app->make($this->namespace . '\SinoPacController');
    }

    /**
     * Define the "Credit" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapCreditRoutes()
    {
        \Route::group([
          'namespace' => $this->namespace,
          'prefix' => 'bsp',
        ], function ($router) {
            require __DIR__.'/routes.php';
        });
    }


}
