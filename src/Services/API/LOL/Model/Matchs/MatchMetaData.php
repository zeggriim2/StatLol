<?php

namespace App\Services\API\LOL\Model\Matchs;

class MatchMetaData
{
    private string $dataVersion;
    private string $matchId;
    /**
     * @var array<string>
     */
    private array $participants;

    public function getDataVersion(): string
    {
        return $this->dataVersion;
    }

    public function setDataVersion(string $dataVersion): MatchMetaData
    {
        $this->dataVersion = $dataVersion;
        return $this;
    }

    public function getMatchId(): string
    {
        return $this->matchId;
    }

    public function setMatchId(string $matchId): MatchMetaData
    {
        $this->matchId = $matchId;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param array<string> $participants
     * @return MatchMetaData
     */
    public function setParticipants(array $participants): MatchMetaData
    {
        $this->participants = $participants;
        return $this;
    }
}
