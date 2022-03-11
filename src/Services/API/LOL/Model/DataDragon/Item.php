<?php

namespace App\Services\API\LOL\Model\DataDragon;

use App\Services\API\LOL\Model\DataDragon\Commun\Image;
use App\Services\API\LOL\Model\DataDragon\Item\ItemGold;
use App\Services\API\LOL\Model\DataDragon\Item\ItemStat;

class Item
{
    private ?int $id = null;
    private string $name;
    private string $description;
    private string $colloq;
    private string $plaintext;
    /**
     * @var array<string>
     */
    private ?array $from = null;
    /**
     * @var array<string>
     */
    private array $into;
    private Image $image;
    private ItemGold $gold;
    /**
     * @var array<string>
     */
    private array $tags;
    /**
     * @var array<string>
     */
    private array $maps;
    private ItemStat $stats;
    private ?int $depth = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Item
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    public function getColloq(): string
    {
        return $this->colloq;
    }

    public function setColloq(string $colloq): Item
    {
        $this->colloq = $colloq;
        return $this;
    }

    public function getPlaintext(): string
    {
        return $this->plaintext;
    }

    public function setPlaintext(string $plaintext): Item
    {
        $this->plaintext = $plaintext;
        return $this;
    }

    /**
     * @return array<string>|null
     */
    public function getFrom(): ?array
    {
        return $this->from;
    }

    /**
     * @param array<string>|null $from
     */
    public function setFrom(?array $from): Item
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getInto(): array
    {
        return $this->into;
    }

    /**
     * @param array<string> $into
     */
    public function setInto(array $into): Item
    {
        $this->into = $into;
        return $this;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): Item
    {
        $this->image = $image;
        return $this;
    }

    public function getGold(): ItemGold
    {
        return $this->gold;
    }

    public function setGold(ItemGold $gold): Item
    {
        $this->gold = $gold;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array<string> $tags
     */
    public function setTags(array $tags): Item
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getMaps(): array
    {
        return $this->maps;
    }

    /**
     * @param array<string> $maps
     */
    public function setMaps(array $maps): Item
    {
        $this->maps = $maps;
        return $this;
    }

    public function getStats(): ItemStat
    {
        return $this->stats;
    }

    public function setStats(ItemStat $stats): Item
    {
        $this->stats = $stats;
        return $this;
    }

    public function getDepth(): ?int
    {
        return $this->depth;
    }

    public function setDepth(?int $depth): Item
    {
        $this->depth = $depth;
        return $this;
    }
}
