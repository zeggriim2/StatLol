<?php

namespace App\Tests;

use App\Services\API\LOL\ChampionMasteryApi;
use App\Services\API\LOL\Model\ChampionMastery;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ChampionMasteryApiTest extends KernelTestCase
{
    private ?ChampionMasteryApi $championMasteryApi;

    protected function setUp(): void
    {
        $this->championMasteryApi = static::getContainer()->get(ChampionMasteryApi::class);
    }

    public function testChampionMasteryBySummonerIdSuccess()
    {
        $listChampionMastery = $this->championMasteryApi->championMasteryBySummonerId(
            "tSmVTVjydJYj5gbjMy8IhFkyMpgWhc4JNdH4ZbqHal3maT4"
        );

        $this->assertIsArray($listChampionMastery);

        foreach ($listChampionMastery as $championMastery) {
            $this->assertInstanceOf(ChampionMastery::class, $championMastery);
        }
    }

    public function testChampionMasteryBySummonerIdEmpty()
    {
        $this->assertNull($this->championMasteryApi->championMasteryBySummonerId(""));
    }

    public function testChampionMasteryBySummonerIdBad()
    {
        $this->assertNull($this->championMasteryApi->championMasteryBySummonerId("aregah('h"));
    }

    public function testChampionMasteryBySummonerIdByChampionIdSuccess()
    {
        $championMastery = $this->championMasteryApi->championMasteryBySummonerIdByChampionId(
            "tSmVTVjydJYj5gbjMy8IhFkyMpgWhc4JNdH4ZbqHal3maT4",
            23
        );

        $this->assertInstanceOf(ChampionMastery::class, $championMastery);
    }

    public function testChampionMasteryBySummonerIdByChampionIdEmpty()
    {
        $this->assertNull($this->championMasteryApi->championMasteryBySummonerIdByChampionId(
            "",
            0
        ));
    }

    public function testChampionMasteryBySummonerIdByChampionIdBad()
    {
        $this->assertNull($this->championMasteryApi->championMasteryBySummonerIdByChampionId(
            "aregah",
            0
        ));
    }

    public function testChampionMasterybySummonerIdSumScoreAllChampSuccess()
    {
        $this->assertIsInt($this->championMasteryApi->championMasterSumLvlAllChampion(
            "tSmVTVjydJYj5gbjMy8IhFkyMpgWhc4JNdH4ZbqHal3maT4"
        ));
    }

    public function testChampionMasterybySummonerIdSumScoreAllChampEmpty()
    {
        $this->assertNull(
            $this->championMasteryApi->championMasterSumLvlAllChampion("")
        );
    }
}
