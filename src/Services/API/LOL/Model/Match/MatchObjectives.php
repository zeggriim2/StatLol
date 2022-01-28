<?php

namespace App\Services\API\LOL\Model\Match;

class MatchObjectives
{
    private MatchObjective $baron;
    private MatchObjective $champion;
    private MatchObjective $dragon;
    private MatchObjective $inhibitor;
    private MatchObjective $riftHerald;
    private MatchObjective $tower;

    public function getBaron(): MatchObjective
    {
        return $this->baron;
    }

    public function setBaron(MatchObjective $baron): MatchObjectives
    {
        $this->baron = $baron;
        return $this;
    }

    public function getChampion(): MatchObjective
    {
        return $this->champion;
    }

    public function setChampion(MatchObjective $champion): MatchObjectives
    {
        $this->champion = $champion;
        return $this;
    }

    public function getDragon(): MatchObjective
    {
        return $this->dragon;
    }

    public function setDragon(MatchObjective $dragon): MatchObjectives
    {
        $this->dragon = $dragon;
        return $this;
    }

    public function getInhibitor(): MatchObjective
    {
        return $this->inhibitor;
    }

    public function setInhibitor(MatchObjective $inhibitor): MatchObjectives
    {
        $this->inhibitor = $inhibitor;
        return $this;
    }

    public function getRiftHerald(): MatchObjective
    {
        return $this->riftHerald;
    }

    public function setRiftHerald(MatchObjective $riftHerald): MatchObjectives
    {
        $this->riftHerald = $riftHerald;
        return $this;
    }

    public function getTower(): MatchObjective
    {
        return $this->tower;
    }

    public function setTower(MatchObjective $tower): MatchObjectives
    {
        $this->tower = $tower;
        return $this;
    }
}
