<?php

namespace App\Services\API\LOL\Model\Matchs;

class MatchObjective
{
    private bool $first;
    private int $kills;

    public function isFirst(): bool
    {
        return $this->first;
    }

    public function setFirst(bool $first): MatchObjective
    {
        $this->first = $first;
        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): MatchObjective
    {
        $this->kills = $kills;
        return $this;
    }
}
