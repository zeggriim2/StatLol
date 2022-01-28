<?php

namespace App\Services\API\LOL\Model\Match;

class MatchTeam
{
    /**
     * @var MatchBan[]
     */
    private array $bans;
    private MatchObjectives $objectives;
    private int $teamId;
    private bool $win;

    /**
     * @return MatchBan[]
     */
    public function getBans(): array
    {
        return $this->bans;
    }

    /**
     * @param MatchBan[] $bans
     * @return MatchTeam
     */
    public function setBans(array $bans): MatchTeam
    {
        $this->bans = $bans;
        return $this;
    }

    public function getObjectives(): MatchObjectives
    {
        return $this->objectives;
    }

    public function setObjectives(MatchObjectives $objectives): MatchTeam
    {
        $this->objectives = $objectives;
        return $this;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function setTeamId(int $teamId): MatchTeam
    {
        $this->teamId = $teamId;
        return $this;
    }

    public function isWin(): bool
    {
        return $this->win;
    }

    public function setWin(bool $win): MatchTeam
    {
        $this->win = $win;
        return $this;
    }
}
