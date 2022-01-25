<?php

namespace App\Services\API\LOL\Model;

class League
{
    private string $leagueId;
    private string $queueType;
    private string $tier;
    private string $rank;
    private string $summonerId;
    private string $summonerName;
    private int $leaguePoints;
    private int $wins;
    private int $losses;
    private bool $veteran;
    private bool $inactive;
    private bool $freshBlood;
    private bool $hotStreak;

    public function getLeagueId(): string
    {
        return $this->leagueId;
    }

    public function setLeagueId(string $leagueId): League
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    public function getQueueType(): string
    {
        return $this->queueType;
    }

    public function setQueueType(string $queueType): League
    {
        $this->queueType = $queueType;
        return $this;
    }

    public function getTier(): string
    {
        return $this->tier;
    }

    public function setTier(string $tier): League
    {
        $this->tier = $tier;
        return $this;
    }

    public function getRank(): string
    {
        return $this->rank;
    }

    public function setRank(string $rank): League
    {
        $this->rank = $rank;
        return $this;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function setSummonerId(string $summonerId): League
    {
        $this->summonerId = $summonerId;
        return $this;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function setSummonerName(string $summonerName): League
    {
        $this->summonerName = $summonerName;
        return $this;
    }

    public function getLeaguePoints(): int
    {
        return $this->leaguePoints;
    }

    public function setLeaguePoints(int $leaguePoints): League
    {
        $this->leaguePoints = $leaguePoints;
        return $this;
    }

    public function getWins(): int
    {
        return $this->wins;
    }

    public function setWins(int $wins): League
    {
        $this->wins = $wins;
        return $this;
    }

    public function getLosses(): int
    {
        return $this->losses;
    }

    public function setLosses(int $losses): League
    {
        $this->losses = $losses;
        return $this;
    }

    public function isVeteran(): bool
    {
        return $this->veteran;
    }

    public function setVeteran(bool $veteran): League
    {
        $this->veteran = $veteran;
        return $this;
    }

    public function isInactive(): bool
    {
        return $this->inactive;
    }

    public function setInactive(bool $inactive): League
    {
        $this->inactive = $inactive;
        return $this;
    }

    public function isFreshBlood(): bool
    {
        return $this->freshBlood;
    }
    public function setFreshBlood(bool $freshBlood): League
    {
        $this->freshBlood = $freshBlood;
        return $this;
    }

    public function isHotStreak(): bool
    {
        return $this->hotStreak;
    }

    public function setHotStreak(bool $hotStreak): League
    {
        $this->hotStreak = $hotStreak;
        return $this;
    }
}
