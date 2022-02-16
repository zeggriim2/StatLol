<?php

namespace App\Services\API\LOL\Model\DataDragon;

class GameMode
{
    private string $gameMode;
    private string $description;

    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    public function setGameMode(string $gameMode): GameMode
    {
        $this->gameMode = $gameMode;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): GameMode
    {
        $this->description = $description;
        return $this;
    }
}
