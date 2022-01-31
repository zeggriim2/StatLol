<?php

namespace App\Services\API\LOL;

use App\Services\API\LOL\Model\Config\Region;
use App\Services\API\LOL\Model\Matchs;
use App\Services\API\LOL\Model\MatchsTimeLine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class MatchApi
{
    private const URL_RACINE = "https://{region}.api.riotgames.com/lol/";
    private const URL_LIST_MATCH_PUUID =
        self::URL_RACINE . "match/v5/matches/by-puuid/{puuid}/ids";
    private const URL_DETAIL_MATCH_MATCHID =
        self::URL_RACINE . "match/v5/matches/{matchId}";
    private const URL_TIMELINE_MATCH =
        self::URL_RACINE . "match/v5/matches/EUW1_5694485275/timeline";

    private BaseApi $baseApi;
    private DenormalizerInterface $denormalizer;

    public function __construct(
        BaseApi $baseApi,
        DenormalizerInterface $denormalizer
    ) {
        $this->baseApi = $baseApi;
        $this->denormalizer = $denormalizer;
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

        return $league;
    }

    public function matchByMatchId(string $matchId): ?Matchs
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

        /** @var Matchs $matchDetailDenormalize */
        $matchDetailDenormalize = $this->denormalize($matchDetail, MatchsTimeLine::class);

        return $matchDetailDenormalize;
    }

    public function matchTimeLineByMatchId(string $matchId): ?MatchsTimeLine
    {
        if (strlen($matchId) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_TIMELINE_MATCH,
            [
                "region" => Region::EUROPE,
                 "matchId" => $matchId
             ]
        );

        /** @var array<string,mixed> $matchDetailTimeLine */
        $matchDetailTimeLine = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        /** @var MatchsTimeLine $matchDetailTimeLineDenormalize */
        $matchDetailTimeLineDenormalize = $this->denormalize($matchDetailTimeLine, MatchsTimeLine::class);

        return $matchDetailTimeLineDenormalize;
    }

    /**
     * @param array<string,mixed> $data
     * @return Matchs|MatchsTimeLine
     */
    private function denormalize(array $data, string $type)
    {
        return $this->denormalizer->denormalize($data, $type);
    }
}
