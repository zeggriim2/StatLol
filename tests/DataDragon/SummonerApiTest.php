<?php

namespace App\Tests\DataDragon;

use App\Services\API\LOL\DataDragon\SummonerApi;
use App\Services\API\LOL\Model\DataDragon\Summoner\SummonerData;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SummonerApiTest extends KernelTestCase
{
    private ?SummonerApi $summonerApi;

    protected function setUp(): void
    {
        $this->summonerApi = static::getContainer()->get(SummonerApi::class);
    }

    public function testSummoner()
    {
        $summoners = $this->summonerApi->summoner("12.3.1", "fr_FR");

        $this->assertIsArray($summoners);

        foreach ($summoners as $summoner) {
            $this->assertInstanceOf(SummonerData::class, $summoner);
        }
    }
}
