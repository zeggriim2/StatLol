<?php

namespace App\Services\API\LOL\Model;

use App\Services\API\LOL\Model\MatchsTimeLine\MatchTimeLineInfo;
use App\Services\API\LOL\Model\MatchsTimeLine\MatchTimeLineMetaData;

class MatchsTimeLine
{
    private MatchTimeLineMetaData $metadata;
    private MatchTimeLineInfo $info;

    public function getMetadata(): MatchTimeLineMetaData
    {
        return $this->metadata;
    }

    public function setMetadata(MatchTimeLineMetaData $metadata): MatchsTimeLine
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function getInfo(): MatchTimeLineInfo
    {
        return $this->info;
    }

    public function setInfo(MatchTimeLineInfo $info): MatchsTimeLine
    {
        $this->info = $info;
        return $this;
    }
}
