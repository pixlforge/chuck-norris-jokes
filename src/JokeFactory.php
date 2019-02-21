<?php

namespace Pixlforge\ChuckNorrisJokes;

class JokeFactory
{
    protected $jokes = [
        'Chuck Norris counted to infinity... Twice.',
        "Chuck Norris' tears cure cancer. Too bad he has never cried.",
        'There is no theory of evolution. Just a list of animals Chuck Norris allows to live.',
        'Chuck Norris is not hung like a horse... horses are hung like Chuck Norris.',
        'Time waits for no man. Unless that man is Chuck Norris.',
        'Chuck Norris can judge a book by its cover.',
        "Chuck Norris doesn't read books. He stares them down until he gets the information he wants."
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }
    
    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
