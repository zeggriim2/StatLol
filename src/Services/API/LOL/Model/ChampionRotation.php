<?php

namespace App\Services\API\LOL\Model;

class ChampionRotation
{
    private int $maxNewPlayerLevel;

    /**
     * @var array <array-key,int>
     */
    private array $freeChampionIdsForNewPlayers;
    /**
     * @var array <array-key,int>
     */
    private array $freeChampionIds;

    public function getMaxNewPlayerLevel(): int
    {
        return $this->maxNewPlayerLevel;
    }

    public function setMaxNewPlayerLevel(int $maxNewPlayerLevel): self
    {
        $this->maxNewPlayerLevel = $maxNewPlayerLevel;

        return $this;
    }

    /**
     * @return array <array-key,int>
     */
    public function getFreeChampionIdsForNewPlayers(): array
    {
        return $this->freeChampionIdsForNewPlayers;
    }

    /**
     * @param array<array-key,int> $freeChampionIdsForNewPlayers
     * @return ChampionRotation
     */
    public function setFreeChampionIdsForNewPlayers(array $freeChampionIdsForNewPlayers): self
    {
        $this->freeChampionIdsForNewPlayers = $freeChampionIdsForNewPlayers;

        return $this;
    }

    /**
     * @return array <array-key,int>
     */
    public function getFreeChampionIds(): array
    {
        return $this->freeChampionIds;
    }

    /**
     * @param array<array-key,int> $freeChampionIds
     * @return ChampionRotation
     */
    public function setFreeChampionIds(array $freeChampionIds): self
    {
        $this->freeChampionIds = $freeChampionIds;

        return $this;
    }
}
