<?php

namespace App\Services\API\LOL\Model\MatchsTimeLine;

class MatchTimeLineEvent
{
    private int $timestamp;
    private string $type;
    private ?int $realTimestamp;
    private ?string $levelUpType;
    private ?int $participantId;
    private ?int $skillSlot;
    private ?int $itemId;
    private ?int $creatorId;
    private ?string $wardType;

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): MatchTimeLineEvent
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): MatchTimeLineEvent
    {
        $this->type = $type;
        return $this;
    }

    public function getRealTimestamp(): ?int
    {
        return $this->realTimestamp;
    }

    public function setRealTimestamp(?int $realTimestamp): MatchTimeLineEvent
    {
        $this->realTimestamp = $realTimestamp;
        return $this;
    }

    public function getLevelUpType(): ?string
    {
        return $this->levelUpType;
    }

    public function setLevelUpType(?string $levelUpType): MatchTimeLineEvent
    {
        $this->levelUpType = $levelUpType;
        return $this;
    }

    public function getParticipantId(): ?int
    {
        return $this->participantId;
    }

    public function setParticipantId(?int $participantId): MatchTimeLineEvent
    {
        $this->participantId = $participantId;
        return $this;
    }

    public function getSkillSlot(): ?int
    {
        return $this->skillSlot;
    }

    public function setSkillSlot(?int $skillSlot): MatchTimeLineEvent
    {
        $this->skillSlot = $skillSlot;
        return $this;
    }

    public function getItemId(): ?int
    {
        return $this->itemId;
    }

    public function setItemId(?int $itemId): MatchTimeLineEvent
    {
        $this->itemId = $itemId;
        return $this;
    }

    public function getCreatorId(): ?int
    {
        return $this->creatorId;
    }

    public function setCreatorId(?int $creatorId): MatchTimeLineEvent
    {
        $this->creatorId = $creatorId;
        return $this;
    }

    public function getWardType(): ?string
    {
        return $this->wardType;
    }

    public function setWardType(?string $wardType): MatchTimeLineEvent
    {
        $this->wardType = $wardType;
        return $this;
    }
}
