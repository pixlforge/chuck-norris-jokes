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
        $this->registerCommand();
        $this->loadViews();
        $this->publishResources();
        $this->registerRoutes();
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
    }

    protected function registerCommand()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'chuck-norris');
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/chuck-norris')
        ]);
    }

    protected function registerRoutes()
    {
        Route::get('/chuck-norris', ChuckNorrisController::class)->name('chuck-norris');
    }
}
