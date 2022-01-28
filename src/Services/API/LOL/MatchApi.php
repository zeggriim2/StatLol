<?php

namespace App\Services\API\LOL;

use App\Services\API\LOL\Model\Config\Region;
use Symfony\Component\HttpFoundation\Request;

class MatchApi
{
    private const URL_RACINE = "https://{region}.api.riotgames.com/lol/";
    private const URL_LIST_MATCH_PUUID =
        self::URL_RACINE . "match/v5/matches/by-puuid/{puuid}/ids";
    private const URL_DETAIL_MATCH_MATCHID =
        self::URL_RACINE . "match/v5/matches/{matchId}";

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
                "region" => Region::EUROPE, //TODO A DYNAMISER
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

    public function matchByMatchId(string $matchId)
    {
        if (strlen($matchId) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_DETAIL_MATCH_MATCHID,
            [
                "region" => Region::EUROPE,
                 "matchId" => $matchId
             ]
        );

        /** @var array<string,mixed> $matchDetail */
        $matchDetail = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

//        return $this->denormalize($matchDetail);
    }
}
