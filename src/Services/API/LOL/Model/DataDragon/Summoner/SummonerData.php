<?php

namespace App\Services\API\LOL\Model\DataDragon\Summoner;

use App\Services\API\LOL\Model\DataDragon\Commun\Image;

class SummonerData
{
    private string $id;
    private string $name;
    private string $description;
    private string $tooltip;
    private int $maxrank;
    /**
     * @var array<int>
     */
    private array $cooldown;
    private string $cooldownBurn;
    /**
     * @var array<int>
     */
    private array $cost;
    private string $costBurn;
    /**
     * @var array<null|array<int>>
     */
    private array $effect;
    /**
     * @var array<null|string>
     */
    private array $effectBurn;
//    private $vars;
    private string $key;
    private int $summonerLevel;
    /**
     * @var array<string>
     */
    private array $modes;
    private string $costType;
    private string $maxammo;
    /**
     * @var array<int>
     */
    private array $range;
    private string $rangeBurn;
    private Image $image;
    private string $resource;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): SummonerData
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SummonerData
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): SummonerData
    {
        $this->description = $description;
        return $this;
    }

    public function getTooltip(): string
    {
        return $this->tooltip;
    }

    public function setTooltip(string $tooltip): SummonerData
    {
        $this->tooltip = $tooltip;
        return $this;
    }

    public function getMaxrank(): int
    {
        return $this->maxrank;
    }

    public function setMaxrank(int $maxrank): SummonerData
    {
        $this->maxrank = $maxrank;
        return $this;
    }

    /**
     * @return array<int>
     */
    public function getCooldown(): array
    {
        return $this->cooldown;
    }

    /**
     * @param array<int> $cooldown
     * @return SummonerData
     */
    public function setCooldown(array $cooldown): SummonerData
    {
        $this->cooldown = $cooldown;
        return $this;
    }

    public function getCooldownBurn(): string
    {
        return $this->cooldownBurn;
    }

    public function setCooldownBurn(string $cooldownBurn): SummonerData
    {
        $this->cooldownBurn = $cooldownBurn;
        return $this;
    }

    /**
     * @return array<int>
     */
    public function getCost(): array
    {
        return $this->cost;
    }

    /**
     * @param array<int> $cost
     * @return SummonerData
     */
    public function setCost(array $cost): SummonerData
    {
        $this->cost = $cost;
        return $this;
    }

    public function getCostBurn(): string
    {
        return $this->costBurn;
    }

    public function setCostBurn(string $costBurn): SummonerData
    {
        $this->costBurn = $costBurn;
        return $this;
    }

    /**
     * @return array<null|array<int>>
     */
    public function getEffect(): array
    {
        return $this->effect;
    }

    /**
     * @param array<null|array<int>> $effect
     * @return SummonerData
     */
    public function setEffect(array $effect): SummonerData
    {
        $this->effect = $effect;
        return $this;
    }

    /**
     * @return array<null|string>
     */
    public function getEffectBurn(): array
    {
        return $this->effectBurn;
    }

    /**
     * @param array<null|string> $effectBurn
     * @return SummonerData
     */
    public function setEffectBurn(array $effectBurn): SummonerData
    {
        $this->effectBurn = $effectBurn;
        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): SummonerData
    {
        $this->key = $key;
        return $this;
    }

    public function getSummonerLevel(): int
    {
        return $this->summonerLevel;
    }

    public function setSummonerLevel(int $summonerLevel): SummonerData
    {
        $this->summonerLevel = $summonerLevel;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getModes(): array
    {
        return $this->modes;
    }

    /**
     * @param array<string> $modes
     * @return SummonerData
     */
    public function setModes(array $modes): SummonerData
    {
        $this->modes = $modes;
        return $this;
    }

    public function getCostType(): string
    {
        return $this->costType;
    }

    public function setCostType(string $costType): SummonerData
    {
        $this->costType = $costType;
        return $this;
    }

    public function getMaxammo(): string
    {
        return $this->maxammo;
    }

    public function setMaxammo(string $maxammo): SummonerData
    {
        $this->maxammo = $maxammo;
        return $this;
    }

    /**
     * @return array<int>
     */
    public function getRange(): array
    {
        return $this->range;
    }

    /**
     * @param array<int> $range
     * @return SummonerData
     */
    public function setRange(array $range): SummonerData
    {
        $this->range = $range;
        return $this;
    }

    public function getRangeBurn(): string
    {
        return $this->rangeBurn;
    }

    public function setRangeBurn(string $rangeBurn): SummonerData
    {
        $this->rangeBurn = $rangeBurn;
        return $this;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): SummonerData
    {
        $this->image = $image;
        return $this;
    }

    public function getResource(): string
    {
        return $this->resource;
    }

    public function setResource(string $resource): SummonerData
    {
        $this->resource = $resource;
        return $this;
    }
}
