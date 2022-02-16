<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

class ChampionInfo
{
    private int $attack;
    private int $defense;
    private int $magic;
    private int $difficulty;

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): ChampionInfo
    {
        $this->attack = $attack;
        return $this;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): ChampionInfo
    {
        $this->defense = $defense;
        return $this;
    }

    public function getMagic(): int
    {
        return $this->magic;
    }

    public function setMagic(int $magic): ChampionInfo
    {
        $this->magic = $magic;
        return $this;
    }

    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): ChampionInfo
    {
        $this->difficulty = $difficulty;
        return $this;
    }
}
