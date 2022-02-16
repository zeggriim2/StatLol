<?php

namespace App\Services\API\LOL\Model\DataDragon;

use App\Services\API\LOL\Model\DataDragon\Champion\ChampionInfo;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionSkin;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionStat;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionImage;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionPassive;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionSpell;

class Champion
{
    private ?string $version;
    private string $id;
    private string $key;
    private string $name;
    private string $title;
    private string $blurb;
    private ChampionInfo $info;
    private ChampionImage $image;
    /**
     * @var array<string>
     */
    private array $tags;
    private string $partype;
    private ChampionStat $stats;
    /**
     * @var ChampionSkin[]|null
     */
    private ?array $skins;
    private ?string $lore;
    /**
     * @var array<string>|null
     */
    private ?array $allytips;
    /**
     * @var array<string>|null
     */
    private ?array $enemytips;
    /**
     * @var ChampionSpell[]|null
     */
    private ?array $spells;
    private ?ChampionPassive $passive;


    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): Champion
    {
        $this->version = $version;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setid(string $id): Champion
    {
        $this->id = $id;
        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): Champion
    {
        $this->key = $key;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Champion
    {
        $this->name = $name;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Champion
    {
        $this->title = $title;
        return $this;
    }

    public function getBlurb(): string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): Champion
    {
        $this->blurb = $blurb;
        return $this;
    }

    public function getInfo(): ChampionInfo
    {
        return $this->info;
    }

    public function setInfo(ChampionInfo $info): Champion
    {
        $this->info = $info;
        return $this;
    }

    public function getImage(): ChampionImage
    {
        return $this->image;
    }

    public function setImage(ChampionImage $image): Champion
    {
        $this->image = $image;
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
    public function setTags(array $tags): Champion
    {
        $this->tags = $tags;
        return $this;
    }

    public function getPartype(): string
    {
        return $this->partype;
    }

    public function setPartype(string $partype): Champion
    {
        $this->partype = $partype;
        return $this;
    }

    public function getStats(): ChampionStat
    {
        return $this->stats;
    }

    public function setStats(ChampionStat $stats): Champion
    {
        $this->stats = $stats;
        return $this;
    }

    /**
     * @return ChampionSkin[]
     */
    public function getSkins(): ?array
    {
        return $this->skins;
    }

    /**
     * @param ChampionSkin[] $skins
     */
    public function setSkins(?array $skins): Champion
    {
        $this->skins = $skins;
        return $this;
    }

    public function getLore(): ?string
    {
        return $this->lore;
    }

    public function setLore(?string $lore): Champion
    {
        $this->lore = $lore;
        return $this;
    }

    /**
     * @return array<string>|null
     */
    public function getAllytips(): ?array
    {
        return $this->allytips;
    }

    /**
     * @param array<string>|null $allytips
     */
    public function setAllytips(?array $allytips): Champion
    {
        $this->allytips = $allytips;
        return $this;
    }

    /**
     * @return array<string>|null
     */
    public function getEnemytips(): ?array
    {
        return $this->enemytips;
    }

    /**
     * @param array<string>|null $enemytips
     */
    public function setEnemytips(?array $enemytips): Champion
    {
        $this->enemytips = $enemytips;
        return $this;
    }

    /**
     * @return ChampionSpell[]|null
     */
    public function getSpells(): ?array
    {
        return $this->spells;
    }

    /**
     * @param ChampionSpell[]|null $spells
     */
    public function setSpells(?array $spells): Champion
    {
        $this->spells = $spells;
        return $this;
    }

    public function getPassive(): ?ChampionPassive
    {
        return $this->passive;
    }

    public function setpassive(?ChampionPassive $passive): Champion
    {
        $this->passive = $passive;
        return $this;
    }
}
