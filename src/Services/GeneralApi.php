<?php

namespace App\Services\API\LOL;

use Symfony\Component\HttpFoundation\Request;

class GeneralApi
{
    private const URL_VERSIONS = "https://ddragon.leagueoflegends.com/api/versions.json";

    private BaseApi $baseApi;

    public function __construct(
        BaseApi $baseApi,
    ) {
        $this->baseApi = $baseApi;
    }

    /**
     * @return array<string,int|string>|null
     */
    public function versions(): ?array
    {
        return $this->baseApi->callApi(
            self::URL_VERSIONS,
            Request::METHOD_GET
        );
    }
}
