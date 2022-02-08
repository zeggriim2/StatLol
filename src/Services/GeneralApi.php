<?php

namespace App\Services\API\LOL;

use App\Services\API\LOL\Model\GameMode;
use App\Services\API\LOL\Model\GameType;
use App\Services\API\LOL\Model\Map;
use App\Services\API\LOL\Model\Season;
use App\Services\API\LOL\Model\Queue;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class GeneralApi
{
    private const URL_BASE_STATIC = "https://static.developer.riotgames.com/docs/lol/";
    private const URL_SEASONS = self::URL_BASE_STATIC . "seasons.json";
    private const URL_QUEUES = self::URL_BASE_STATIC . "queues.json";
    private const URL_MAPS = self::URL_BASE_STATIC . "maps.json";
    private const URL_GAMEMODES = self::URL_BASE_STATIC . "gameModes.json";
    private const URL_GAMETYPES = self::URL_BASE_STATIC . "gameTypes.json";
    private const URL_VERSIONS = "https://ddragon.leagueoflegends.com/api/versions.json";
    private const URL_LANGUAGES = "https://ddragon.leagueoflegends.com/cdn/languages.json";

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
     * @return array<string>|null
     */
    public function versions(): ?array
    {
        /** @var array<string> $versions */
        $versions = $this->baseApi->callApi(
            self::URL_VERSIONS,
            Request::METHOD_GET
        );

        return $versions;
    }

    /**
     * @return array<array-key,Season>|null
     */
    public function seasons(): ?array
    {
        /** @var array<array-key,array<string,int|string>>|null  $seasons*/
        $seasons = $this->baseApi->callApi(
            self::URL_SEASONS,
            Request::METHOD_GET
        );

        if (is_null($seasons)) {
            return null;
        }

        /** @var array<array-key,Season>  $seasonsDenormalize*/
        $seasonsDenormalize = $this->denormalizeArray($seasons, Season::class);
        return $seasonsDenormalize;
    }

    /**
     * @return array<array-key,Queue>|null
     */
    public function queues(): ?array
    {
        /** @var array<array-key,array<string,int|string>>|null  $queues*/
        $queues = $this->baseApi->callApi(
            self::URL_QUEUES,
            Request::METHOD_GET
        );

        if (is_null($queues)) {
            return null;
        }
        /** @var array<array-key,Queue>  $queuesDenormalize*/
        $queuesDenormalize = $this->denormalizeArray($queues, Queue::class);
        return $queuesDenormalize;
    }


    /**
     * @return array<array-key,Map>|null
     */
    public function maps(): ?array
    {
        /** @var array<array-key,array<string,int|string>>|null  $maps*/
        $maps = $this->baseApi->callApi(
            self::URL_MAPS,
            Request::METHOD_GET
        );

        if (is_null($maps)) {
            return null;
        }

        /** @var array<array-key,Map>  $mapsDenormalize*/
        $mapsDenormalize = $this->denormalizeArray($maps, Map::class);
        return $mapsDenormalize;
    }

    /**
     * @return array<array-key,GameMode>|null
     */
    public function gameModes(): ?array
    {
        /** @var array<array-key,array<string,int|string>>|null  $gameModes*/
        $gameModes = $this->baseApi->callApi(
            self::URL_GAMEMODES,
            Request::METHOD_GET
        );

        if (is_null($gameModes)) {
            return null;
        }

        /** @var array<array-key,GameMode>  $gameModesDenormalize*/
        $gameModesDenormalize = $this->denormalizeArray($gameModes, GameMode::class);
        return $gameModesDenormalize;
    }

    /**
     * @return array<array-key,GameType>|null
     */
    public function gameTypes(): ?array
    {
        /** @var array<array-key,array<string,int|string>>|null  $gameTypes*/
        $gameTypes = $this->baseApi->callApi(
            self::URL_GAMETYPES,
            Request::METHOD_GET
        );

        if (is_null($gameTypes)) {
            return null;
        }

        /** @var array<array-key,GameType>  $gameTypesDenormalize*/
        $gameTypesDenormalize = $this->denormalizeArray($gameTypes, GameType::class);
        return $gameTypesDenormalize;
    }

    /**
     * @return array<string>|null
     */
    public function languages(): ?array
    {
        /** @var array<string> $languages */
        $languages = $this->baseApi->callApi(
            self::URL_LANGUAGES,
            Request::METHOD_GET
        );

        return $languages;
    }

    /**
     * @param array<array-key,array<string,int|string>> $datas
     * @param string $type
     * @return array<array-key,Season|GameType|GameMode|Map|Queue>
     */
    private function denormalizeArray(array $datas, string $type)
    {
        if (is_array($datas)) {
            $listDataDenormalize = [];
            foreach ($datas as $key => $data) {
                $listDataDenormalize[] = $this->denormalizer->denormalize($data, $type);
            }
            return $listDataDenormalize;
        }
    }
}
