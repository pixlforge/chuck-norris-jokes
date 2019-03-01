<?php

namespace Pixlforge\ChuckNorrisJokes\Http\Controllers;

use Illuminate\Routing\Controller;
use Pixlforge\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController extends Controller
{
    public function __invoke()
    {
        return ChuckNorris::getRandomJoke();
    }
}
