<?php

namespace App\Services\API\LOL\Model\MatchsTimeLine;

class MatchTimeLineParticipant
{
    private int $participantId;
    private string $puuid;

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function setParticipantId(int $participantId): MatchTimeLineParticipant
    {
        $this->participantId = $participantId;
        return $this;
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function setPuuid(string $puuid): MatchTimeLineParticipant
    {
        $this->puuid = $puuid;
        return $this;
    }
}
