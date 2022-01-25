<?php

namespace App\Services\API\LOL\Model;

class ChampionMastery
{
    private int $championPointsUntilNextLevel;
    private bool $chestGranted;
    private int $championId;
    private int $lastPlayTime;
    private int $championLevel;
    private string $summonerId;
    private int $championPoints;
    private int $tokensEarned;

    /**
     * @return int
     */
    public function getChampionPointsUntilNextLevel(): int
    {
        return $this->championPointsUntilNextLevel;
    }

    /**
     * @param int $championPointsUntilNextLevel
     * @return ChampionMastery
     */
    public function setChampionPointsUntilNextLevel(int $championPointsUntilNextLevel): ChampionMastery
    {
        $this->championPointsUntilNextLevel = $championPointsUntilNextLevel;
        return $this;
    }

    /**
     * @return bool
     */
    public function isChestGranted(): bool
    {
        return $this->chestGranted;
    }

    /**
     * @param bool $chestGranted
     * @return ChampionMastery
     */
    public function setChestGranted(bool $chestGranted): ChampionMastery
    {
        $this->chestGranted = $chestGranted;
        return $this;
    }

    /**
     * @return int
     */
    public function getChampionId(): int
    {
        return $this->championId;
    }

    /**
     * @param int $championId
     * @return ChampionMastery
     */
    public function setChampionId(int $championId): ChampionMastery
    {
        $this->championId = $championId;
        return $this;
    }

    public function getLastPlayTime(): int
    {
        return $this->lastPlayTime;
    }

    public function setLastPlayTime(int $lastPlayTime): ChampionMastery
    {
        $this->lastPlayTime = $lastPlayTime;
        return $this;
    }

    public function getChampionLevel(): int
    {
        return $this->championLevel;
    }

    public function setChampionLevel(int $championLevel): ChampionMastery
    {
        $this->championLevel = $championLevel;
        return $this;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function setSummonerId(string $summonerId): ChampionMastery
    {
        $this->summonerId = $summonerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getChampionPoints(): int
    {
        return $this->championPoints;
    }

    public function setChampionPoints(int $championPoints): ChampionMastery
    {
        $this->championPoints = $championPoints;
        return $this;
    }

    public function getTokensEarned(): int
    {
        return $this->tokensEarned;
    }

    public function setTokensEarned(int $tokensEarned): ChampionMastery
    {
        $this->tokensEarned = $tokensEarned;
        return $this;
    }
}
