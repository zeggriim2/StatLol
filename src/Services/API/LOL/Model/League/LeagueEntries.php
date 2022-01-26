<?php

namespace App\Services\API\LOL\Model\League;

class LeagueEntries
{
    private bool $freshBlood;
    private int $wins;
    private string $summonerName;
    private bool $inactive;
    private bool $veteran;
    private bool $hotStreak;
    private string $rank;
    private int $leaguePoints;
    private int $losses;
    private string $summonerId;


    public function getFreshBlood(): bool
    {
        return $this->freshBlood;
    }

    public function setFreshBlood(bool $freshBlood): LeagueEntries
    {
        $this->freshBlood = $freshBlood;
        return $this;
    }

    public function getWins(): int
    {
        return $this->wins;
    }

    public function setWins(int $wins): LeagueEntries
    {
        $this->wins = $wins;
        return $this;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function setSummonerName(string $summonerName): LeagueEntries
    {
        $this->summonerName = $summonerName;
        return $this;
    }

    public function getInactive(): bool
    {
        return $this->inactive;
    }

    public function setInactive(bool $inactive): LeagueEntries
    {
        $this->inactive = $inactive;
        return $this;
    }

    public function getVeteran(): bool
    {
        return $this->veteran;
    }

    public function setVeteran(bool $veteran): LeagueEntries
    {
        $this->veteran = $veteran;
        return $this;
    }

    public function getHotStreak(): bool
    {
        return $this->hotStreak;
    }

    public function setHotStreak(bool $hotStreak): LeagueEntries
    {
        $this->hotStreak = $hotStreak;
        return $this;
    }

    public function getRank(): string
    {
        return $this->rank;
    }

    public function setRank(string $rank): LeagueEntries
    {
        $this->rank = $rank;
        return $this;
    }

    public function getLeaguePoints(): int
    {
        return $this->leaguePoints;
    }

    public function setLeaguePoints(int $leaguePoints): LeagueEntries
    {
        $this->leaguePoints = $leaguePoints;
        return $this;
    }

    public function getLosses(): int
    {
        return $this->losses;
    }

    public function setLosses(int $losses): LeagueEntries
    {
        $this->losses = $losses;
        return $this;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function setSummonerId(string $summonerId): LeagueEntries
    {
        $this->summonerId = $summonerId;
        return $this;
    }
}
