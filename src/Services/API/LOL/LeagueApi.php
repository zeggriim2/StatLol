<?php

namespace App\Services\API\LOL;

use App\Services\API\LOL\Model\League;
use App\Services\API\LOL\Model\LeagueList;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class LeagueApi
{
    private const URL_RACINE = "https://{platform}.api.riotgames.com/lol/";
    private const URL_LEAGUE_SUMMONERID =
        self::URL_RACINE . "league/v4/entries/by-summoner/{summonerId}";

    private const URL_LEAGUE_LEAGUEID =
        self::URL_RACINE . "league/v4/leagues/{leagueId}";

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
     * @return array<array-key,League>|null
     */
    public function leagueBySummonerId(string $summonerId): ?array
    {
        if (strlen($summonerId) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_LEAGUE_SUMMONERID,
            [
                "platform" => $this->baseApi->platform,
                "summonerId" => $summonerId
            ]
        );

        /** @var array<array-key,array<string,int|string|bool>>|null $leagueSummonerId */
        $leagueSummonerId = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($leagueSummonerId)) {
            return null;
        }

        return $this->denormalizeArray($leagueSummonerId);
    }

    public function leagueByLeagueId(string $leagueId): ?LeagueList
    {
        if (strlen($leagueId) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_LEAGUE_LEAGUEID,
            [
                "platform" => $this->baseApi->platform,
                "leagueId" => $leagueId
            ]
        );

        /** @var array<string,string|array<string,int|bool|string>>|null $league */
        $league = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($league)) {
            return null;
        }

        return $this->denormalize($league);
    }


    /**
     * @param array<array-key,array<string,int|string|bool>> $datas
     * @return array<array-key,League>
     */
    private function denormalizeArray(array $datas)
    {
        if (is_array($datas)) {
            $listEntity = [];
            foreach ($datas as $key => $data) {
                $listEntity[] = $this->denormalizer->denormalize($data, League::class);
            }
            return $listEntity;
        }
    }

    /**
     * @param array<string,string|array<string,int|bool|string>> $data
     */
    private function denormalize(array $data): LeagueList
    {
        return $this->denormalizer->denormalize($data, LeagueList::class);
    }
}
