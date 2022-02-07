<?php

namespace App\Tests;

use App\Services\API\LOL\GeneralApi;
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
}
