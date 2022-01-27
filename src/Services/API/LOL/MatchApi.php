<?php

namespace App\Services\API\LOL;

use Symfony\Component\HttpFoundation\Request;

class MatchApi
{
    private const URL_LIST_MATCH_PUUID =
        "https://europe.api.riotgames.com/lol/match/v5/matches/by-puuid/{puuid}/ids";

    private BaseApi $baseApi;

    public function __construct(
        BaseApi $baseApi
    ) {
        $this->baseApi = $baseApi;
    }

    /**
     * @param string $puuid
     * @return array<array-key,string>|null
     */
    public function matchListByPuuid(string $puuid): ?array
    {
        if (strlen($puuid) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_LIST_MATCH_PUUID,
            [
                "puuid" => $puuid
            ]
        );

        /** @var array<array-key,string>|null $league */
        $league =  $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        return$league;
    }
}
