<?php

namespace App\Services\API\LOL\DataDragon;

use App\Services\API\LOL\BaseApi;
use App\Services\API\LOL\Model\DataDragon\Champion;
use App\Services\API\LOL\Model\DataDragon\Summoner\SummonerData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class SummonerApi
{
    private const URL_SUMMONER = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/summoner.json";


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
     * @return array<array-key,SummonerData>|null
     */
    public function summoner(string $version, string $lang): ?array
    {
        if (strlen($version) <= 0 || strlen($lang) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_SUMMONER,
            [
                "version" => $version,
                "lang" => $lang
            ]
        );

        /** @var array<array-key,array<array<string, int|string>>>|null $summoners */
        $summoners = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
        );

        if (is_null($summoners)) {
            return null;
        }

        /** @var array<array-key,SummonerData>|null $summonersDenormalize */
        $summonersDenormalize = $this->denormalizeArray($summoners['data'], SummonerData::class);
        return $summonersDenormalize;
    }

    /**
     * @param array<array-key,array<string,int|string>> $datas
     * @param string $type
     * @return array<array-key,SummonerData>
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
