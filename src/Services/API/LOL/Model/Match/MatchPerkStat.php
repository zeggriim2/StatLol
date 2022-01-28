<?php

namespace App\Services\API\LOL\Model\Match;

class MatchPerkStat
{
    private int $defense;
    private int $flex;
    private int $offense;

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): MatchPerkStat
    {
        $this->defense = $defense;
        return $this;
    }

    public function getFlex(): int
    {
        return $this->flex;
    }

    public function setFlex(int $flex): MatchPerkStat
    {
        $this->flex = $flex;
        return $this;
    }

    public function getOffense(): int
    {
        return $this->offense;
    }

    public function setOffense(int $offense): MatchPerkStat
    {
        $this->offense = $offense;
        return $this;
    }
}
