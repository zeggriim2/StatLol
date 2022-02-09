<?php

namespace App\Tests\DataDragon;

use App\Services\API\LOL\DataDragon\ItemApi;
use App\Services\API\LOL\Model\DataDragon\Item;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ItemApiTest extends KernelTestCase
{
    private ?ItemApi $itemApi;

    protected function setUp(): void
    {
        $this->itemApi = static::getContainer()->get(ItemApi::class);
    }

    public function testItems()
    {
        $items = $this->itemApi->item("12.3.1", "fr_FR");

        $this->assertIsArray($items);

        foreach ($items as $item) {
            $this->assertInstanceOf(Item::class, $item);
        }
    }
}
