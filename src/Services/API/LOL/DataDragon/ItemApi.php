<?php

namespace App\Services\API\LOL\DataDragon;

use App\Services\API\LOL\BaseApi;
use App\Services\API\LOL\Model\DataDragon\Champion;
use App\Services\API\LOL\Model\DataDragon\Item;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ItemApi
{
    private const URL_ITEMS = "https://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/item.json";


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
     * @return array<array-key,Item>|null
     */
    public function items(string $version, string $lang): ?array
    {
        if (strlen($version) <= 0 || strlen($lang) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_ITEMS,
            [
                "version" => $version,
                "lang" => $lang
            ]
        );

        /** @var array<array-key,array<array<string, int|string>>>|null $items */
        $items = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
        );

        if (is_null($items)) {
            return null;
        }
        
        /** @var array<array-key,Item>|null $itemsDenormalize */
        $itemsDenormalize = $this->denormalizeArray($items['data'], Item::class);
        return $itemsDenormalize;
    }


    public function item(int $id, string $version, string $lang): ?Item
    {
        if (strlen($version) <= 0 || strlen($lang) <= 0) {
            return null;
        }

        $url = $this->baseApi->constructUrl(
            self::URL_ITEMS,
            [
                "version" => $version,
                "lang" => $lang
            ]
        );

        /** @var array<array-key,array<array<string, int|string>>>|null $items */
        $items = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
        );

        if (!array_key_exists($id, $items['data'])) {
            return null;
        }
        $itemDenormalize = $this->denormalize($items['data'][$id], Item::class);
        $itemDenormalize->setId($id);
        return $itemDenormalize;
    }

    /**
     * @param array<array-key,array<string,int|string>> $datas
     * @param string $type
     * @return array<array-key,Item>
     */
    private function denormalizeArray(array $datas, string $type)
    {
        if (is_array($datas)) {
            $listDataDenormalize = [];
            foreach ($datas as $key => $data) {
                /** @var Item $itemObject **/
                $itemObject = $this->denormalizer->denormalize($data, $type);
                $itemObject->setId((int)$key);
                $listDataDenormalize[$key] = $itemObject;
            }
            return $listDataDenormalize;
        }
    }

    /**
     * @param array<string,int|string> $data
     * @return Item
     */
    private function denormalize($data, string $type)
    {
        return $this->denormalizer->denormalize($data, $type);
    }
}
