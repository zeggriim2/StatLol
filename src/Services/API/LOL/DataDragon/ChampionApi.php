<?php

namespace App\Services\API\LOL\DataDragon;

use App\Services\API\LOL\BaseApi;
use App\Services\API\LOL\Model\DataDragon\Champion;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ChampionApi
{
    private const URL_CHAMPIONS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion.json";
    private const URL_CHAMPION =
        "https://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion/{nameChampion}.json";


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
     * @return array<array-key,Champion>|null
     */
    public function champions(string $version, string $lang): ?array
    {
        if (strlen($version) <= 0 || strlen($lang) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_CHAMPIONS,
            [
                "version" => $version,
                "lang" => $lang
            ]
        );

        /** @var array<array-key,array<array<string, int|string>>>|null $champions */
        $champions = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
        );

        if (is_null($champions)) {
            return null;
        }

        /** @var array<array-key,Champion>|null $championsDenormalize */
        $championsDenormalize = $this->denormalizeArray($champions['data'], Champion::class);
        return $championsDenormalize;
    }

    /**
     * @return champion|null
     */
    public function champion(string $nameChampion, string $version, string $lang)
    {
        if (strlen($version) <= 0 || strlen($lang) <= 0 || strlen($nameChampion) <= 0) {
            return null;
        }

        // Check si le nom de champion Existe
        $names = [];
        $champions = $this->champions($version, $lang);

        // Récupère les noms de tout les champions
        $names = array_map(function ($champion) {
            return $champion->getName();
        }, $champions);

        if (!in_array(ucFirst($nameChampion), $names)) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_CHAMPION,
            [
                "nameChampion" => ucFirst($nameChampion),
                "version" => $version,
                "lang" => $lang
            ]
        );

        /** @var array<string,array<string,array<string,int|string|array<int|string>>>>|null $champion */
        $champion = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
        );

        /** @var Champion $championDenormalize */
        $championDenormalize = $this->denormalize($champion['data'][ucFirst($nameChampion)], Champion::class);
        return $championDenormalize;
    }

    /**
     * @param array<array-key,array<string,int|string>> $datas
     * @param string $type
     * @return array<array-key,Champion>
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

    /**
     * @param array<string,int|string|array<int|string>> $data
     * @return Champion
     */
    private function denormalize($data, string $type)
    {
        return $this->denormalizer->denormalize($data, $type);
    }
}
