<?php

namespace App\Services\API\LOL\Model;

class Queue
{
    private int $queueId;
    private string $map;
    private ?string $description;
    private ?string $notes;

    public function getQueueId(): int
    {
        return $this->queueId;
    }

    public function setQueueId(int $queueId): Queue
    {
        $this->queueId = $queueId;
        return $this;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): Queue
    {
        $this->map = $map;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Queue
    {
        $this->description = $description;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): Queue
    {
        $this->notes = $notes;
        return $this;
    }
}
