<?php

namespace App\Tests;

use App\Services\API\LOL\ChampionRotationApi;
use App\Services\API\LOL\MatchApi;
use App\Services\API\LOL\Model\ChampionRotation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MatchApiTest extends KernelTestCase
{
    private ?MatchApi $matchApi;

    protected function setUp(): void
    {
        $this->matchApi = static::getContainer()->get(MatchApi::class);
    }


    public function testMatchListByPuuid()
    {
        $this->assertIsArray($this->matchApi->matchListByPuuid(
            "NFLqmQ-TfqzILQI1aYhPTIBn6FG1Ox3QYT2sCGDRQNlEQC8MVIzkOjw2VAncGE70VF-L4ptfaUxEUw"
        ));
    }
}