<?php

namespace App\Services\API\LOL\Model\MatchsTimeLine;

class MatchTimeLineFrame
{
    /**
     * @var MatchTimeLineEvent[]
     */
    private array $events;

    /**
     * @var array<int, array<string,int|string>>
     */
    private array $participantFrames;
    private int $timestamp;

    /**
     * @return MatchTimeLineEvent[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param MatchTimeLineEvent[] $events
     * @return MatchTimeLineFrame
     */
    public function setEvents(array $events): MatchTimeLineFrame
    {
        $this->events = $events;
        return $this;
    }

    /**
     * @return array<int, array<string,int|string>>
     */
    public function getParticipantFrames(): array
    {
        return $this->participantFrames;
    }

    /**
     * @param array<int, array<string,int|string>> $participantFrames
     * @return MatchTimeLineFrame
     */
    public function setParticipantFrames(array $participantFrames): MatchTimeLineFrame
    {
        $this->participantFrames = $participantFrames;
        return $this;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): MatchTimeLineFrame
    {
        $this->timestamp = $timestamp;
        return $this;
    }
}
