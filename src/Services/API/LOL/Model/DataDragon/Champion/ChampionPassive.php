<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

use App\Services\API\LOL\Model\DataDragon\Commun\Image;

class ChampionPassive
{
    private string $name;
    private string $description;
    private Image $image;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ChampionPassive
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): ChampionPassive
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): ChampionPassive
    {
        $this->image = $image;
        return $this;
    }
}
