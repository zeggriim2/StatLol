<?php

namespace App\Tests;

use App\Services\API\LOL\ChampionMasteryApi;
use App\Services\API\LOL\Model\ChampionMastery;
use App\Services\API\LOL\Model\Status;
use App\Services\API\LOL\StatusApi;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class StatusApiTest extends KernelTestCase
{
    private ?StatusApi $statusApi;

    protected function setUp(): void
    {
        $this->statusApi = static::getContainer()->get(StatusApi::class);
    }

    public function testStatusSuccess()
    {
        $this->assertInstanceOf(
            Status::class,
            $this->statusApi->status()
        );
    }
}
