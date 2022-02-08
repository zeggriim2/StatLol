<?php

namespace App\Tests;

use App\Services\API\LOL\GeneralApi;
use App\Services\API\LOL\Model\DataDragon\Map;
use App\Services\API\LOL\Model\DataDragon\Queue;
use App\Services\API\LOL\Model\DataDragon\Season;
use App\Services\API\LOL\Model\DataDragon\Champion;
use App\Services\API\LOL\Model\DataDragon\GameMode;
use App\Services\API\LOL\Model\DataDragon\GameType;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GeneralApiTest extends KernelTestCase
{
    private ?GeneralApi $generalApi;

    protected function setUp(): void
    {
        $this->generalApi = static::getContainer()->get(GeneralApi::class);
    }

    public function testVersions()
    {
        $versions = $this->generalApi->versions();

        $this->assertIsArray($versions);
    }

    public function testSeasons()
    {
        $seasons = $this->generalApi->seasons();

        $this->assertIsArray($seasons);

        foreach ($seasons as $season) {
            $this->assertInstanceOf(Season::class, $season);
        }
    }

    public function testQueues()
    {
        $queues = $this->generalApi->queues();

        $this->assertIsArray($queues);

        foreach ($queues as $queue) {
            $this->assertInstanceOf(Queue::class, $queue);
        }
    }

    public function testMaps()
    {
        $maps = $this->generalApi->maps();

        $this->assertIsArray($maps);

        foreach ($maps as $map) {
            $this->assertInstanceOf(Map::class, $map);
        }
    }

    public function testGameModes()
    {
        $gameModes = $this->generalApi->gameModes();

        $this->assertIsArray($gameModes);

        foreach ($gameModes as $gameMode) {
            $this->assertInstanceOf(GameMode::class, $gameMode);
        }
    }

    public function testGameTypes()
    {
        $gameTypes = $this->generalApi->gameTypes();

        $this->assertIsArray($gameTypes);

        foreach ($gameTypes as $gameType) {
            $this->assertInstanceOf(GameType::class, $gameType);
        }
    }

    public function testChampions()
    {
        $champions = $this->generalApi->champions("12.3.1", "fr_FR");

        $this->assertIsArray($champions);

        foreach ($champions as $champion) {
            $this->assertInstanceOf(Champion::class, $champion);
        }
    }
}
