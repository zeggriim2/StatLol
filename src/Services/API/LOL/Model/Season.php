<?php

namespace App\Services\API\LOL\Model;

class Season
{
    private int $id;
    private string $season;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Season
    {
        $this->id = $id;
        return $this;
    }

    public function getSeason(): string
    {
        return $this->season;
    }

    public function setSeason(string $season): Season
    {
        $this->season = $season;
        return $this;
    }
}
