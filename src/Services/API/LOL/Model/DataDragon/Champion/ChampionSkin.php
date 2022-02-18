<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

class ChampionSkin
{
    private ?string $id;
    private int $num;
    private string $name;
    private bool $chromas;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): ChampionSkin
    {
        $this->id = $id;
        return $this;
    }

    public function getNum(): int
    {
        return $this->num;
    }

    public function setNum(int $num): ChampionSkin
    {
        $this->num = $num;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ChampionSkin
    {
        $this->name = $name;
        return $this;
    }

    public function getChromas(): bool
    {
        return $this->chromas;
    }

    public function setChromas(bool $chromas): ChampionSkin
    {
        $this->chromas = $chromas;
        return $this;
    }
}
