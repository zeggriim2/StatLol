<?php

namespace App\Tests;

use App\Services\API\LOL\ChampionApi;
use App\Services\API\LOL\Model\ChampionRotation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ChampionApiTest extends KernelTestCase
{
    private ?ChampionApi $championApi;

    protected function setUp(): void
    {
        $this->championApi = static::getContainer()->get(ChampionApi::class);
    }


    public function testChampionRotation()
    {
        $this->assertInstanceOf(
            ChampionRotation::class,
            $this->championApi->championRotation()
        );
    }
}
