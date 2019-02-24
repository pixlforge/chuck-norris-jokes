<?php

namespace Pixlforge\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Pixlforge\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $chuckNorrisJokes = [
            'Chuck Norris counted to infinity... Twice.',
            "Chuck Norris' tears cure cancer. Too bad he has never cried.",
            'There is no theory of evolution. Just a list of animals Chuck Norris allows to live.',
            'Chuck Norris is not hung like a horse... horses are hung like Chuck Norris.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'Chuck Norris can judge a book by its cover.',
            "Chuck Norris doesn't read books. He stares them down until he gets the information he wants.",
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chuckNorrisJokes);
    }
}
