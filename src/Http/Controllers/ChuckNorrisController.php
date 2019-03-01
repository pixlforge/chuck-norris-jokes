<?php

namespace Pixlforge\ChuckNorrisJokes\Http\Controllers;

use Illuminate\Routing\Controller;
use Pixlforge\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController extends Controller
{
    public function __invoke()
    {
        return view('chuck-norris::joke', [
            'joke' => ChuckNorris::getRandomJoke()
        ]);
    }
}
