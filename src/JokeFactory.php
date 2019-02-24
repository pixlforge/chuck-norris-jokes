<?php

namespace Pixlforge\ChuckNorrisJokes;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class JokeFactory
{
    /**
     * The API endpoint.
     */
    const API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    /**
     * Guzzle client property.
     *
     * @var GuzzleHttp\Client $client
     */
    protected $client;

    /**
     * JokeFactory constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function getRandomJoke()
    {
        $response = $this->client->get(self::API_ENDPOINT);

        $joke = json_decode($response->getBody()->getContents());

        return $joke->value->joke;
    }
}
