<?php

namespace App\Services\API\LOL;

use App\Services\API\LOL\Model\ChampionMastery;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ChampionMasteryApi
{
//    private const URL_RACINE = "https://{platform}.api.riotgames.com/lol/";
    private const URL_MASTERY_SUMMONERID =
        BaseApi::URL_RACINE_PLATFORM . "champion-mastery/v4/champion-masteries/by-summoner/{summonerId}";
    private const URL_MASTERY_SUMMONERID_CHAMPIONID =
        BaseApi::URL_RACINE_PLATFORM
        . "champion-mastery/v4/champion-masteries/by-summoner/{summonerId}/by-champion/{championId}";
    private const URL_CHAMPION_ALL =
        BaseApi::URL_RACINE_PLATFORM . "champion-mastery/v4/scores/by-summoner/{summonerId}";

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
     * @return array<array-key,ChampionMastery>|null
     */
    public function championMasteryBySummonerId(string $summonerId): ?array
    {
        if (strlen($summonerId) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_MASTERY_SUMMONERID,
            [
                "platform" => $this->baseApi->platform,
                "summonerId" => $summonerId
            ]
        );

        /** @var array<array-key,array<string,int|string>>|null $championMastery */
        $championMastery = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($championMastery)) {
            return null;
        }

        return $this->denormalizeArray($championMastery);
    }

    public function championMasteryBySummonerIdByChampionId(string $summonerId, int $championId): ?ChampionMastery
    {
        if (strlen($summonerId) <= 0) {
            return null;
        }


        $url = $this->baseApi->constructUrl(
            self::URL_MASTERY_SUMMONERID_CHAMPIONID,
            [
                "platform" => $this->baseApi->platform,
                "summonerId" => $summonerId,
                "championId" => (string)$championId
            ]
        );

        /** @var array<string,int|string>|null $championMastery */
        $championMastery = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($championMastery)) {
            return null;
        }

        return $this->denormalize($championMastery);
    }

    public function championMasterSumLvlAllChampion(string $summonerId): ?int
    {
        if (strlen($summonerId) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_CHAMPION_ALL,
            [
                "platform" => $this->baseApi->platform,
                "summonerId" => $summonerId
            ]
        );

        return (int) $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ],
            "content"
        );
    }

    /**
     * @param array<array-key,array<string,int|string>> $datas
     * @return array<array-key,ChampionMastery>
     */
    private function denormalizeArray(array $datas)
    {
        if (is_array($datas)) {
            $listChampionMastery = [];
            foreach ($datas as $key => $data) {
                $listChampionMastery[] = $this->denormalizer->denormalize($data, ChampionMastery::class);
            }
            return $listChampionMastery;
        }
    }

    /**
     * @param array<string,int|string> $data
     * @return ChampionMastery
     */
    private function denormalize(array $data)
    {
        return $this->denormalizer->denormalize($data, ChampionMastery::class);
    }
}
