<?php

namespace App\Services\API\LOL\Model\Match;

class MatchTimeLineMetaData
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

    public function setDataVersion(string $dataVersion): MatchTimeLineMetaData
    {
        $this->dataVersion = $dataVersion;
        return $this;
    }

    public function getMatchId(): string
    {
        return $this->matchId;
    }

    public function setMatchId(string $matchId): MatchTimeLineMetaData
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
     * @return MatchTimeLineMetaData
     */
    public function setParticipants(array $participants): MatchTimeLineMetaData
    {
        $this->participants = $participants;
        return $this;
    }
}
