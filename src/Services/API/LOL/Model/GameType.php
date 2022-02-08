<?php

namespace App\Services\API\LOL\Model;

class GameType
{
    private string $gametype;
    private string $description;

    public function getGameType(): string
    {
        return $this->gametype;
    }

    public function setGameMode(string $gametype): GameType
    {
        $this->gametype = $gametype;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): GameType
    {
        $this->description = $description;
        return $this;
    }
}
