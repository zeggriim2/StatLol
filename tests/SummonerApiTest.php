<?php

namespace App\Tests;

use App\Services\API\LOL\ChampionRotationApi;
use App\Services\API\LOL\Model\Summoner;
use App\Services\API\LOL\SummonerApi;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SummonerApiTest extends KernelTestCase
{
    public ?SummonerApi $summonerApi;

    protected function setUp(): void
    {
        $this->summonerApi = static::getContainer()->get(SummonerApi::class);
    }

    public function testSummonerByNameSuccess()
    {
        $this->assertInstanceOf(
            Summoner::class,
            $this->summonerApi->summonerBySummonerName("jarkalien")
        );
    }

    public function testSummonerByNameBad()
    {
        $this->assertNull($this->summonerApi->summonerBySummonerName("rzgakrj"));
    }

    public function testSummonerByNameEmpty()
    {
        $this->assertNull($this->summonerApi->summonerBySummonerName(""));
    }

    public function testSummonerByAccountIdSuccess()
    {
        $this->assertInstanceOf(
            Summoner::class,
            $this->summonerApi->summonerByAccountId("vppsXdQUkIWjEkVAVLjdy4tgz0Ogy08aj_nzJIajal5JdQ")
        );
    }

    public function testSummonerByAccountIdBad()
    {
        $this->assertNull($this->summonerApi->summonerByAccountId("rzgakrj"));
    }
    public function testSummonerByAccountIdEmpty()
    {
        $this->assertNull($this->summonerApi->summonerByAccountId(""));
    }

    public function testSummonerByPuuidSuccess()
    {
        $this->assertInstanceOf(
            Summoner::class,
            $this->summonerApi->SummonerByPuuid(
                "NFLqmQ-TfqzILQI1aYhPTIBn6FG1Ox3QYT2sCGDRQNlEQC8MVIzkOjw2VAncGE70VF-L4ptfaUxEUw"
            )
        );
    }

    public function testSummonerByPuuidBad()
    {
        $this->assertNull($this->summonerApi->SummonerByPuuid("rzgakrj"));
    }

    public function testSummonerByPuuidEmpty()
    {
        $this->assertNull($this->summonerApi->SummonerByPuuid(""));
    }

    public function testSummonerBySummonerIdSuccess()
    {
        $this->assertInstanceOf(
            Summoner::class,
            $this->summonerApi->SummonerBySummonerId("tSmVTVjydJYj5gbjMy8IhFkyMpgWhc4JNdH4ZbqHal3maT4")
        );
    }

    public function testSummonerBySummonerIdBad()
    {
        $this->assertNull($this->summonerApi->SummonerBySummonerId("rzgakrj"));
    }

    public function testSummonerBySummonerIdEmpty()
    {
        $this->assertNull($this->summonerApi->SummonerBySummonerId(""));
    }
}
