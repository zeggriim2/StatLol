<?php

namespace App\Tests;

use App\Services\API\LOL\LeagueApi;
use App\Services\API\LOL\Model\Config\Queue;
use App\Services\API\LOL\Model\League;
use App\Services\API\LOL\Model\League\LeagueEntries;
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
        $leagueId = $this->leagueApi->leagueByLeagueId(
            "88604355-0fcc-49fe-a86e-9ccefd564b60"
        );

        $this->assertInstanceOf(
            LeagueList::class,
            $leagueId
        );

        if (count($leagueId->getEntries()) > 0) {
            foreach ($leagueId->getEntries() as $leagueIdEntries) {
                $this->assertInstanceOf(LeagueEntries::class, $leagueIdEntries);
            }
        }
    }

    public function testLeagueByLeagueIdEmpty()
    {
        $this->assertNull($this->leagueApi->leagueByLeagueId(''));
    }

    public function testLeagueByLeagueIdBad()
    {
        $this->assertNull($this->leagueApi->leagueByLeagueId('aegaregaerr'));
    }

    public function testLeagueChallengerByQueueRankedSoloSuccess()
    {
        $leagueChallangerSolo = $this->leagueApi->leagueChallengerByQueue(Queue::RANKED_SOLO);

        $this->assertInstanceOf(
            LeagueList::class,
            $leagueChallangerSolo
        );

        if (count($leagueChallangerSolo->getEntries()) > 0) {
            foreach ($leagueChallangerSolo->getEntries() as $leagueChallangerEntries) {
                $this->assertInstanceOf(
                    LeagueEntries::class,
                    $leagueChallangerEntries
                );
            }
        }
    }

    public function testLeagueChallengerByQueueRankedFlexSuccess()
    {
        $leagueChallangerFlex = $this->leagueApi->leagueChallengerByQueue(Queue::RANKED_FLEX);

        $this->assertInstanceOf(
            LeagueList::class,
            $leagueChallangerFlex
        );

        if (count($leagueChallangerFlex->getEntries()) > 0) {
            foreach ($leagueChallangerFlex->getEntries() as $leagueChallangerEntries) {
                $this->assertInstanceOf(
                    LeagueEntries::class,
                    $leagueChallangerEntries
                );
            }
        }
    }

    public function testLeagueChallengerByQueueRankedBad()
    {
        $this->assertNull($this->leagueApi->leagueChallengerByQueue('aegaregaerr'));
    }

    public function testLeagueChallengerByQueueRankedEmpty()
    {
        $this->assertNull($this->leagueApi->leagueChallengerByQueue(''));
    }

    public function testLeagueGrandMasterByQueueRankedSoloSuccess()
    {
        $leagueGrandMasterSolo = $this->leagueApi->leagueGrandMasterByQueue(Queue::RANKED_SOLO);

        $this->assertInstanceOf(
            LeagueList::class,
            $leagueGrandMasterSolo
        );

        if (count($leagueGrandMasterSolo->getEntries()) > 0) {
            foreach ($leagueGrandMasterSolo->getEntries() as $leagueGrandMasterEntries) {
                $this->assertInstanceOf(
                    LeagueEntries::class,
                    $leagueGrandMasterEntries
                );
            }
        }
    }

    public function testLeagueGrandMasterByQueueRankedFlexSuccess()
    {
        $leagueGrandMasterFlex = $this->leagueApi->leagueGrandMasterByQueue(Queue::RANKED_FLEX);

        $this->assertInstanceOf(
            LeagueList::class,
            $leagueGrandMasterFlex
        );

        if (count($leagueGrandMasterFlex->getEntries()) > 0) {
            foreach ($leagueGrandMasterFlex->getEntries() as $leagueGrandMasterEntries) {
                $this->assertInstanceOf(
                    LeagueEntries::class,
                    $leagueGrandMasterEntries
                );
            }
        }
    }

    public function testLeagueGrandMasterByQueueRankedBad()
    {
        $this->assertNull($this->leagueApi->leagueGrandMasterByQueue('aegaregaerr'));
    }

    public function testLeagueGrandMasterByQueueRankedEmpty()
    {
        $this->assertNull($this->leagueApi->leagueGrandMasterByQueue(''));
    }

    public function testLeagueMasterByQueueRankedSoloSuccess()
    {
        $leagueMasterSolo = $this->leagueApi->leagueMasterByQueue(Queue::RANKED_SOLO);

        $this->assertInstanceOf(
            LeagueList::class,
            $leagueMasterSolo
        );

        if (count($leagueMasterSolo->getEntries()) > 0) {
            foreach ($leagueMasterSolo->getEntries() as $leagueMasterEntries) {
                $this->assertInstanceOf(
                    LeagueEntries::class,
                    $leagueMasterEntries
                );
            }
        }
    }

    public function testLeagueMasterByQueueRankedFlexSuccess()
    {
        $leagueMasterFlex = $this->leagueApi->leagueMasterByQueue(Queue::RANKED_FLEX);

        $this->assertInstanceOf(
            LeagueList::class,
            $leagueMasterFlex
        );

        if (count($leagueMasterFlex->getEntries()) > 0) {
            foreach ($leagueMasterFlex->getEntries() as $leagueMasterEntries) {
                $this->assertInstanceOf(
                    LeagueEntries::class,
                    $leagueMasterEntries
                );
            }
        }
    }

    public function testLeagueMasterByQueueRankedBad()
    {
        $this->assertNull($this->leagueApi->leagueMasterByQueue('aegaregaerr'));
    }

    public function testLeagueMasterByQueueRankedEmpty()
    {
        $this->assertNull($this->leagueApi->leagueMasterByQueue(''));
    }
}
