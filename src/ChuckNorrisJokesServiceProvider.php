<?php

namespace Pixlforge\ChuckNorrisJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pixlforge\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Pixlforge\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    /**
     * The package boot method.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerCommand();
        $this->loadViews();
        $this->publishResources();
    }

    /**
     * The package register method.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });

        $this->registerConfig();
    }

    /**
     * Register and merge the config files.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/chuck-norris.php', 'chuck-norris');
    }

    /**
     * Register the package specific routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::get(config('chuck-norris.route'), ChuckNorrisController::class)->name('chuck-norris');
    }

    /**
     * Register the package artisan commands.
     *
     * @return void
     */
    protected function registerCommand()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }
    }

    /**
     * Load the package views.
     *
     * @return void
     */
    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-norris');
    }

    /**
     * Publish the package resources.
     *
     * @return void
     */
    protected function publishResources()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/chuck-norris.php' => base_path('config/chuck-norris.php'),
        ], 'config');
    }
}
