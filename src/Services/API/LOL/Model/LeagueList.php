<?php

namespace App\Services\API\LOL\Model;

use App\Services\API\LOL\Model\League\LeagueEntries;

class LeagueList
{
    private string $leagueId;
    private string $tier;
    private string $queue;
    private string $name;
    /**
     * @var LeagueEntries[]|null
     */
    private ?array $entries;

    public function getLeagueId(): string
    {
        return $this->leagueId;
    }

    public function setLeagueId(string $leagueId): LeagueList
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    public function getTier(): string
    {
        return $this->tier;
    }

    public function setTier(string $tier): LeagueList
    {
        $this->tier = $tier;
        return $this;
    }

    public function getQueue(): string
    {
        return $this->queue;
    }

    public function setQueue(string $queue): LeagueList
    {
        $this->queue = $queue;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): LeagueList
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array<array-key,LeagueEntries>|null
     */
    public function getEntries(): ?array
    {
        return $this->entries;
    }

    /**
     * @param array<array-key,LeagueEntries>|null $entries
     */
    public function setEntries(?array $entries): LeagueList
    {
        $this->entries = $entries;
        return $this;
    }
}
