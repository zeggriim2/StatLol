<?php

namespace App\Services\API\LOL\Model\DataDragon;

use App\Services\API\LOL\Model\DataDragon\Commun\Image;

class ProfileIcon
{
    private int $id;
    private Image $image;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ProfileIcon
    {
        $this->id = $id;
        return $this;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): ProfileIcon
    {
        $this->image = $image;
        return $this;
    }
}
