<?php

namespace App\Services\API\LOL\Model;

use App\Services\API\LOL\Model\Match\MatchInfo;
use App\Services\API\LOL\Model\Match\MatchMetaData;

class Matchs
{
    private MatchMetaData $metadata;
    private MatchInfo $info;

    public function getMetadata(): MatchMetaData
    {
        return $this->metadata;
    }

    public function setMetadata(MatchMetaData $metadata): Matchs
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function getInfo(): MatchInfo
    {
        return $this->info;
    }

    public function setInfo(MatchInfo $info): Matchs
    {
        $this->info = $info;
        return $this;
    }
}
