<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

class ChampionImage
{
    private string $full;
    private string $sprite;
    private string $group;
    private int $x;
    private int $y;
    private int $w;
    private int $h;

    public function getFull(): string
    {
        return $this->full;
    }

    public function setFull(string $full): ChampionImage
    {
        $this->full = $full;
        return $this;
    }

    public function getSprite(): string
    {
        return $this->sprite;
    }

    public function setSprite(string $sprite): ChampionImage
    {
        $this->sprite = $sprite;
        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): ChampionImage
    {
        $this->group = $group;
        return $this;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): ChampionImage
    {
        $this->x = $x;
        return $this;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): ChampionImage
    {
        $this->y = $y;
        return $this;
    }

    public function getW(): int
    {
        return $this->w;
    }

    public function setW(int $w): ChampionImage
    {
        $this->w = $w;
        return $this;
    }

    public function getH(): int
    {
        return $this->h;
    }

    public function setH(int $h): ChampionImage
    {
        $this->h = $h;
        return $this;
    }
}
