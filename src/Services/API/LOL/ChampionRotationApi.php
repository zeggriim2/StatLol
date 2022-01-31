<?php

namespace App\Services\API\LOL;

use App\Services\API\LOL\Model\ChampionRotation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ChampionRotationApi
{
//  private const URL_RACINE = "https://{region}.api.riotgames.com/lol/";
    private const URL_CHAMPION_ROTATION =
        BaseApi::URL_RACINE_REGION . "platform/v3/champion-rotations";

    private BaseApi $baseApi;
    private DenormalizerInterface $denormalizer;

    public function __construct(
        BaseApi $baseApi,
        DenormalizerInterface $denormalizer
    ) {
        $this->baseApi = $baseApi;
        $this->denormalizer = $denormalizer;
    }

    public function championRotation(): ?ChampionRotation
    {
        $url = $this->baseApi->constructUrl(
            self::URL_CHAMPION_ROTATION,
            [
                "region" => $this->baseApi->platform
            ]
        );
        /** @var array<string,array<int>|int>|null $championRotation */
        $championRotation = $this->baseApi->callApi(
            $url,
            Request::METHOD_GET,
            [
                "headers" => [
                    "X-Riot-Token" => $this->baseApi->apiKey
                ]
            ]
        );

        if (is_null($championRotation)) {
            return null;
        }

        return $this->denormalize($championRotation, ChampionRotation::class);
    }

    /**
     * @param array<string,array<int>|int> $data
     * @param string $type
     * @return ChampionRotation
     */
    private function denormalize(array $data, string $type): ChampionRotation
    {
        return $this->denormalizer->denormalize($data, $type);
    }
}
