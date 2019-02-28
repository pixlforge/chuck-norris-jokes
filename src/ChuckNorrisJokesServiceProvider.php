<?php

namespace Pixlforge\ChuckNorrisJokes;

use Illuminate\Support\ServiceProvider;
use Pixlforge\ChuckNorrisJokes\Console\ChuckNorrisJoke;

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
