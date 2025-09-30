<?php

namespace Hardy\AppClima;

use GuzzleHttp\Client;

class WeatherService
{

    private Client $client;

    public function __construct(
        private readonly string $apiKey = 'TU API KEY',
        private readonly string $apiUrl = 'URL API'
    ) {
        $this->client = new Client([]);
    }

    public function getWeather(string $city): array
    {
        $response = $this->client->get(
            $this->apiUrl,
            [
                'query' => [
                    'q' => $city,
                    'appid' => $this->apiKey,
                    'units' => 'metric',
                ]
            ]
        );

        $weatherData = json_decode($response->getBody()->getContents(), true);

        return [
            'city' => $weatherData['name'],
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
            'humidity' => $weatherData['main']['humidity'],
        ];

    }
}
