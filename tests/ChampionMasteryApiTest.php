<?php

namespace App\Tests;

use App\Services\API\LOL\ChampionRotationApi;
use App\Services\API\LOL\Model\ChampionRotation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ChampionRotationApiTest extends KernelTestCase
{
    private ?ChampionRotationApi $championApi;

    protected function setUp(): void
    {
        $this->championApi = static::getContainer()->get(ChampionRotationApi::class);
    }


    public function testChampionRotation()
    {
        $this->assertInstanceOf(
            ChampionRotation::class,
            $this->championApi->championRotation()
        );
    }
}
