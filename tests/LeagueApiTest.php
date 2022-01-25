<?php

namespace App\Tests;

use App\Services\API\LOL\LeagueApi;
use App\Services\API\LOL\Model\League;
use App\Services\API\LOL\Model\LeagueList;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LeagueApiTest extends KernelTestCase
{
    private ?LeagueApi $leagueApi;

    protected function setUp(): void
    {
        $this->leagueApi = static::getContainer()->get(LeagueApi::class);
    }

    public function testLeagueBySummonerIdSuccess()
    {
        $listLeague = $this->leagueApi->leagueBySummonerId(
            "tSmVTVjydJYj5gbjMy8IhFkyMpgWhc4JNdH4ZbqHal3maT4"
        );

        $this->assertIsArray($listLeague);

        foreach ($listLeague as $league) {
            $this->assertInstanceOf(League::class, $league);
        }
    }

    public function testLeagueBySummonerIdEmpty()
    {
        $this->assertNull($this->leagueApi->leagueBySummonerId(''));
    }

    public function testLeagueBySummonerIdBad()
    {
        $this->assertNull($this->leagueApi->leagueBySummonerId('aegaregaerr'));
    }

    public function testLeagueByLeagueIdSuccess()
    {
        $this->assertInstanceOf(
            LeagueList::class,
            $this->leagueApi->leagueByLeagueId(
                "88604355-0fcc-49fe-a86e-9ccefd564b60"
            )
        );
    }

    public function testLeagueByLeagueIdEmpty()
    {
        $this->assertNull($this->leagueApi->leagueByLeagueId(''));
    }

    public function testLeagueByLeagueIdBad()
    {
        $this->assertNull($this->leagueApi->leagueByLeagueId('aegaregaerr'));
    }
}
