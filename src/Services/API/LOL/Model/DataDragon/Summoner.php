<?php

namespace App\Services\API\LOL\Model\DataDragon;

use App\Services\API\LOL\Model\DataDragon\Summoner\SummonerData;

class Summoner
{
    private string $type;
    private string $version;
    private SummonerData $data;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Summoner
    {
        $this->type = $type;
        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): Summoner
    {
        $this->version = $version;
        return $this;
    }

    public function getData(): SummonerData
    {
        return $this->data;
    }

    public function setData(SummonerData $data): Summoner
    {
        $this->data = $data;
        return $this;
    }
}
