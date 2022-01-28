<?php

namespace App\Services\API\LOL\Model\Match;

class MatchBan
{
    private int $championId;
    private int $pickTurn;

    public function getChampionId(): int
    {
        return $this->championId;
    }

    public function setChampionId(int $championId): MatchBan
    {
        $this->championId = $championId;
        return $this;
    }

    public function getPickTurn(): int
    {
        return $this->pickTurn;
    }

    public function setPickTurn(int $pickTurn): MatchBan
    {
        $this->pickTurn = $pickTurn;
        return $this;
    }
}
