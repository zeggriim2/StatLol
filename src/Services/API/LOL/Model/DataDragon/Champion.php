<?php

namespace App\Services\API\LOL\Model\DataDragon;

use App\Services\API\LOL\Model\DataDragon\Champion\ChampionInfo;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionImage;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionStat;

class Champion
{
    private string $version;
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
}
