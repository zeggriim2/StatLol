<?php

namespace App\Tests;

use App\Services\API\LOL\Model\DataDragon\Champion;
use App\Services\API\LOL\Model\DataDragon\ChampionApi;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ChampionApiTest extends KernelTestCase
{
    private ?ChampionApi $championApi;

    protected function setUp(): void
    {
        $this->championApi = static::getContainer()->get(ChampionApi::class);
    }

    public function testChampions()
    {
        $champions = $this->championApi->champions("12.3.1", "fr_FR");

        $this->assertIsArray($champions);

        foreach ($champions as $champion) {
            $this->assertInstanceOf(Champion::class, $champion);
        }
    }
}
