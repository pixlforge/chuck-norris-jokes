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
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'chuck-norris');

        Route::get('/chuck-norris', ChuckNorrisController::class)->name('chuck-norris');
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
}
