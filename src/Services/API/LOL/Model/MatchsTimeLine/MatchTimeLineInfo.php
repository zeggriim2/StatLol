<?php

namespace App\Services\API\LOL\Model\MatchsTimeLine;

class MatchTimeLineInfo
{
    private int $frameInterval;
    /**
     * @var MatchTimeLineFrame[]
     */
    private array $frames;
    private int $gameId;
    /**
     * @var MatchTimeLineParticipant[]
     */
    private array $participants;

    public function getFrameInterval(): int
    {
        return $this->frameInterval;
    }

    public function setFrameInterval(int $frameInterval): MatchTimeLineInfo
    {
        $this->frameInterval = $frameInterval;
        return $this;
    }

    /**
     * @return array<MatchTimeLineFrame>
     */
    public function getFrames(): array
    {
        return $this->frames;
    }

    /**
     * @param array<MatchTimeLineFrame> $frames
     * @return MatchTimeLineInfo
     */
    public function setFrames(array $frames): MatchTimeLineInfo
    {
        $this->frames = $frames;
        return $this;
    }

    public function getGameId(): int
    {
        return $this->gameId;
    }

    public function setGameId(int $gameId): MatchTimeLineInfo
    {
        $this->gameId = $gameId;
        return $this;
    }

    /**
     * @return array<MatchTimeLineParticipant>
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param array<MatchTimeLineParticipant> $participants
     * @return MatchTimeLineInfo
     */
    public function setParticipants(array $participants): MatchTimeLineInfo
    {
        $this->participants = $participants;
        return $this;
    }
}
