<?php

namespace App\Services\API\LOL;

use App\Services\API\LOL\Model\Summoner;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class SummonerApi
{
    private const URL_RACINE = "https://{region}.api.riotgames.com/lol/summoner/v4/summoners/";
    private const URL_NAME = self::URL_RACINE . "by-name/{name}";
    private const URL_ACCOUNTID = self::URL_RACINE . "by-account/{accountId}";
    private const URL_PUUID = self::URL_RACINE . "by-puuid/{puuid}";
    private const URL_SUMMONERID = self::URL_RACINE . "{summonerId}";

    private BaseApi $baseApi;
    private DenormalizerInterface $denormalizer;

    public function __construct(
        BaseApi $baseApi,
        DenormalizerInterface $denormalizer
    ) {
        $this->baseApi = $baseApi;
        $this->denormalizer = $denormalizer;
    }

    public function summonerBySummonerName(string $summonerName): ?Summoner
    {
        $url = $this->baseApi->constructUrl(self::URL_NAME, [
            "region" => "euw1",
            "name" => $summonerName
        ]);


        $summoner = $this->baseApi->callApi(
            Request::METHOD_GET,
            $url,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );
        if (is_null($summoner)) {
            return null;
        }

        return $this->denormalize($summoner);
    }

    public function summonerByAccountId(string $accountId): ?Summoner
    {
        $url = $this->baseApi->constructUrl(self::URL_ACCOUNTID, [
            "region" => "euw1",
            "accountId" => $accountId
        ]);

        $summoner = $summoner = $this->baseApi->callApi(
            Request::METHOD_GET,
            $url,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($summoner)) {
            return null;
        }

        return $this->denormalize($summoner);
    }

    public function summonerByPuuid(string $puuid): ?Summoner
    {
        $url = $this->baseApi->constructUrl(self::URL_PUUID, [
            "region" => "euw1",
            "puuid" => $puuid
        ]);

        $summoner = $summoner = $this->baseApi->callApi(
            Request::METHOD_GET,
            $url,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($summoner)) {
            return null;
        }

        return $this->denormalize($summoner);
    }

    public function summonerBySummonerId(string $summonerId): ?Summoner
    {
        $url = $this->baseApi->constructUrl(self::URL_SUMMONERID, [
            "region" => "euw1",
            "summonerId" => $summonerId
        ]);

        $summoner = $summoner = $this->baseApi->callApi(
            Request::METHOD_GET,
            $url,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($summoner)) {
            return null;
        }

        return $this->denormalize($summoner);
    }

    private function denormalize(array $data): Summoner
    {
        return $this->denormalizer->denormalize($data, Summoner::class);
    }
}
