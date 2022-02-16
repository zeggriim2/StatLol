<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

use App\Services\API\LOL\Model\DataDragon\Commun\Image;

class ChampionSpell
{
    private string $id;
    private string $name;
    private string $description;
    private string $tooltip;
    /**
     * @var array<string,array<string>>
     */
    private array $leveltip;
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

    public function setId(string $id): ChampionSpell
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ChampionSpell
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): ChampionSpell
    {
        $this->description = $description;
        return $this;
    }

    public function getTooltip(): string
    {
        return $this->tooltip;
    }

    public function setTooltip(string $tooltip): ChampionSpell
    {
        $this->tooltip = $tooltip;
        return $this;
    }


    /**
     * @return array<string,array<string>>
     */
    public function getLeveltip(): array
    {
        return $this->leveltip;
    }


    /**
     * @param array<string,array<string>> $leveltip
     */
    public function setLeveltip(array $leveltip): ChampionSpell
    {
        $this->leveltip = $leveltip;
        return $this;
    }

    public function getMaxrank(): int
    {
        return $this->maxrank;
    }

    public function setMaxrank(int $maxrank): ChampionSpell
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
     */
    public function setCooldown(array $cooldown): ChampionSpell
    {
        $this->cooldown = $cooldown;
        return $this;
    }

    public function getCooldownBurn(): string
    {
        return $this->cooldownBurn;
    }

    public function setCooldownBurn(string $cooldownBurn): ChampionSpell
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
     */
    public function setCost(array $cost): ChampionSpell
    {
        $this->cost = $cost;
        return $this;
    }

    public function getCostBurn(): string
    {
        return $this->costBurn;
    }

    public function setCostBurn(string $costBurn): ChampionSpell
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
     */
    public function setEffect(array $effect): ChampionSpell
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
     */
    public function setEffectBurn(array $effectBurn): ChampionSpell
    {
        $this->effectBurn = $effectBurn;
        return $this;
    }

    public function getCostType(): string
    {
        return $this->costType;
    }

    public function setCostType(string $costType): ChampionSpell
    {
        $this->costType = $costType;
        return $this;
    }

    public function getMaxammo(): string
    {
        return $this->maxammo;
    }

    public function setMaxammo(string $maxammo): ChampionSpell
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
     */
    public function setRange(array $range): ChampionSpell
    {
        $this->range = $range;
        return $this;
    }

    public function getRangeBurn(): string
    {
        return $this->rangeBurn;
    }

    public function setRangeBurn(string $rangeBurn): ChampionSpell
    {
        $this->rangeBurn = $rangeBurn;
        return $this;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): ChampionSpell
    {
        $this->image = $image;
        return $this;
    }

    public function getResource(): string
    {
        return $this->resource;
    }

    public function setResource(string $resource): ChampionSpell
    {
        $this->resource = $resource;
        return $this;
    }
}
