<?php

namespace Pixlforge\ChuckNorrisJokes\Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Pixlforge\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 460, "joke": "The only pattern Chuck Norris knows is God Object.", "categories": ["nerdy"] } }')
        ]);

        $handler = HandlerStack::create($mock);

        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('The only pattern Chuck Norris knows is God Object.', $joke);
    }
}
