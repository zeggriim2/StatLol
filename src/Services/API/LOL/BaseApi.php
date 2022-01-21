<?php

namespace App\Services\API\LOL;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BaseApi
{
    public string $apiKey;
    public HttpClientInterface $client;


    public function __construct(
        string $apiKey,
        HttpClientInterface $client
    ) {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    /**
     *
     * @param string $url
     * @param array<string> $params
     * @return string
     */
    public function constructUrl(string $url, array $params): string
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }

    /**
     * @param string $url
     * @param string $method
     * @param array<string> $options
     * @return array<string>|null
     */
    public function callApi(string $url, string $method = "GET", array $options = []): ?array
    {
        $response = $this->client->request($method, $url, $options);
        $statusCode = $response->getStatusCode();

        switch ($statusCode) {
            case Response::HTTP_OK:
                return $response->toArray();

            default:
                return null;
        }
    }
}
