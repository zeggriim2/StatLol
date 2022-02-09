<?php

namespace App\Services\API\LOL\Model\DataDragon;

use App\Services\API\LOL\Model\DataDragon\Commun\Image;

class Item
{
    private string $name;
    private string $description;
    private string $colloq;
    private string $plaintext;
    /**
     * @var array<string>
     */
    private array $into;
    private Image $image;
    private $gold;
    /**
     * @var array<string>
     */
    private array $tags;
    /**
     * @var array<int,bool>
     */
    private array $maps;
    private $stats;
}
