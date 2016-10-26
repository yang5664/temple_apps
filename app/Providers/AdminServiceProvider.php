<?php

namespace App\Providers;

use App\Admin\Routing\Router;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        'MakeCommand',
        'MenuCommand',
        'InstallCommand',
        'UninstallCommand',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin.auth' => \Encore\Admin\Middleware\Authenticate::class,
        'admin.pjax' => \Encore\Admin\Middleware\PjaxMiddleware::class,
    ];

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        // 客製化視圖 laravel-admin
        $this->loadViewsFrom(__DIR__.'/../../resources/views/vendor/encore/laravel-admin', 'admin');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang/vendor/laravel-admin', 'admin');

        // publish views & lang & provider & routing & controllers
        $this->publishes([
          'vendor/encore/laravel-admin/views' => resource_path('views/vendor/encore/laravel-admin'),
          'vendor/encore/laravel-admin/lang' => resource_path('lang/vendor/laravel-admin'),
          'vendor/encore/laravel-admin/src/Providers' => app_path('providers'),
          'vendor/encore/laravel-admin/src/Controllers' => app_path('Admin/Controllers'),
          'vendor/encore/laravel-admin/src/Routing' => app_path('Admin/Routing'),
          'vendor/encore/laravel-admin/src/Auth' => app_path('Models/Admin'),
        ]);

        if (file_exists($routes = admin_path('routes.php'))) {
            require $routes;

            $this->app['admin.router']->register();
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();

            $loader->alias('Admin', \Encore\Admin\Facades\Admin::class);

            $this->setupAuth();
        });

        $this->setupClassAliases();
        $this->registerRouteMiddleware();
        $this->registerCommands();

        $this->registerRouter();
    }

    /**
     * Setup auth configuration.
     *
     * @return void
     */
    protected function setupAuth()
    {
        config([
            'auth.guards.admin.driver'    => 'session',
            'auth.guards.admin.provider'  => 'admin',
            'auth.providers.admin.driver' => 'eloquent',
            'auth.providers.admin.model'  => 'App\Models\Admin\Database\Administrator',
        ]);
    }

    /**
     * Setup the class aliases.
     *
     * @return void
     */
    protected function setupClassAliases()
    {
        $aliases = [
            'admin.router'  => \App\Admin\Routing\Router::class,
        ];

        foreach ($aliases as $key => $alias) {
            $this->app->alias($key, $alias);
        }
    }

    /**
     * Register admin routes.
     *
     * @return void
     */
    public function registerRouter()
    {
        $this->app->singleton('admin.router', function ($app) {
            return new Router($app['router']);
        });
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->middleware($key, $middleware);
        }
    }

    /**
     * Register the commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        foreach ($this->commands as $command) {
            $this->commands('Encore\Admin\Commands\\'.$command);
        }
    }
}
