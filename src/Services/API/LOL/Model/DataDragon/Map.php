<?php

namespace App\Services\API\LOL\Model\DataDragon;

class Map
{
    private int $mapId;
    private string $mapName;
    private string $notes;

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): Map
    {
        $this->mapId = $mapId;
        return $this;
    }

    public function getMapName(): string
    {
        return $this->mapName;
    }

    public function setMapName(string $mapName): Map
    {
        $this->mapName = $mapName;
        return $this;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): Map
    {
        $this->notes = $notes;
        return $this;
    }
}
