<?php

namespace App\Services\API\LOL\Model;

class Summoner
{
    private string $accountId;
    private int $profileIconId;
    private int $revisionDate;
    private string $name;
    private string $id;
    private string $puuid;
    private int $summonerLevel;

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getProfileIconId(): int
    {
        return $this->profileIconId;
    }

    public function setProfileIconId(int $profileIconId): self
    {
        $this->profileIconId = $profileIconId;

        return $this;
    }

    public function getRevisionDate(): int
    {
        return $this->revisionDate;
    }

    public function setRevisionDate(int $revisionDate): self
    {
        $this->revisionDate = $revisionDate;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function setPuuid(string $puuid): self
    {
        $this->puuid = $puuid;

        return $this;
    }

    public function getSummonerLevel(): int
    {
        return $this->summonerLevel;
    }

    public function setSummonerLevel(int $summonerLevel): self
    {
        $this->summonerLevel = $summonerLevel;

        return $this;
    }
}
