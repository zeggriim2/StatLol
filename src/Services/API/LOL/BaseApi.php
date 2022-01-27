<?php

namespace App\Services\API\LOL;

use phpDocumentor\Reflection\Types\ArrayKey;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BaseApi
{
    public string $apiKey;
    public string $platform;
    public HttpClientInterface $client;

    public function __construct(
        string $apiKey,
        string $platform,
        HttpClientInterface $client
    ) {
        $this->apiKey   = $apiKey;
        $this->platform = $platform;
        $this->client   = $client;
    }

    /**
     *
     * @param string $url
     * @param array<string,string> $params
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
     * @param array<string,string|array<string|string>> $options
     * @param string $return
     * @return string|array<int|string|ArrayKey,int|string|bool>|null
     */
    public function callApi(string $url, string $method = "GET", array $options = [], string $return = "array")
    {
        $response = $this->client->request($method, $url, $options);
        $statusCode = $response->getStatusCode();
        switch ($statusCode) {
            case Response::HTTP_OK:
                if ($return == "array") {
                    return $response->toArray();
                } else {
                    return $response->getContent();
                }
            case Response::HTTP_NOT_FOUND:
            default:
                return null;
        }
    }
}
