<?php

namespace App\Services\API\LOL\Model\Matchs;

class MatchInfo
{
    private int $gameCreation;
    private int $gameDuration;
    private int $gameEndTimestamp;
    private int $gameId;
    private string $gameMode;
    private string $gameName;
    private int $gameStartTimestamp;
    private string $gameType;
    private string $gameVersion;
    private int $mapId;
    /**
     * @var MatchParticipant[]
     */
    private array $participants;
    private string $platformId;
    private int $queueId;
    /**
     * @var MatchTeam[]
     */
    private array $teams;
    private string $tournamentCode;

    public function getGameCreation(): int
    {
        return $this->gameCreation;
    }

    public function setGameCreation(int $gameCreation): MatchInfo
    {
        $this->gameCreation = $gameCreation;
        return $this;
    }

    public function getGameDuration(): int
    {
        return $this->gameDuration;
    }

    public function setGameDuration(int $gameDuration): MatchInfo
    {
        $this->gameDuration = $gameDuration;
        return $this;
    }

    public function getGameEndTimestamp(): int
    {
        return $this->gameEndTimestamp;
    }

    public function setGameEndTimestamp(int $gameEndTimestamp): MatchInfo
    {
        $this->gameEndTimestamp = $gameEndTimestamp;
        return $this;
    }

    public function getGameId(): int
    {
        return $this->gameId;
    }

    public function setGameId(int $gameId): MatchInfo
    {
        $this->gameId = $gameId;
        return $this;
    }

    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    public function setGameMode(string $gameMode): MatchInfo
    {
        $this->gameMode = $gameMode;
        return $this;
    }

    public function getGameName(): string
    {
        return $this->gameName;
    }

    public function setGameName(string $gameName): MatchInfo
    {
        $this->gameName = $gameName;
        return $this;
    }
    public function getGameStartTimestamp(): int
    {
        return $this->gameStartTimestamp;
    }

    public function setGameStartTimestamp(int $gameStartTimestamp): MatchInfo
    {
        $this->gameStartTimestamp = $gameStartTimestamp;
        return $this;
    }

    public function getGameType(): string
    {
        return $this->gameType;
    }

    public function setGameType(string $gameType): MatchInfo
    {
        $this->gameType = $gameType;
        return $this;
    }

    public function getGameVersion(): string
    {
        return $this->gameVersion;
    }

    public function setGameVersion(string $gameVersion): MatchInfo
    {
        $this->gameVersion = $gameVersion;
        return $this;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): MatchInfo
    {
        $this->mapId = $mapId;
        return $this;
    }

    /**
     * @return MatchParticipant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param MatchParticipant[] $participants
     * @return MatchInfo
     */
    public function setParticipants(array $participants): MatchInfo
    {
        $this->participants = $participants;
        return $this;
    }

    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    public function setPlatformId(string $platformId): MatchInfo
    {
        $this->platformId = $platformId;
        return $this;
    }

    public function getQueueId(): int
    {
        return $this->queueId;
    }

    public function setQueueId(int $queueId): MatchInfo
    {
        $this->queueId = $queueId;
        return $this;
    }

    /**
     * @return MatchTeam[]
     */
    public function getTeams(): array
    {
        return $this->teams;
    }

    /**
     * @param MatchTeam[] $teams
     * @return MatchInfo
     */
    public function setTeams(array $teams): MatchInfo
    {
        $this->teams = $teams;
        return $this;
    }

    public function getTournamentCode(): string
    {
        return $this->tournamentCode;
    }

    public function setTournamentCode(string $tournamentCode): MatchInfo
    {
        $this->tournamentCode = $tournamentCode;
        return $this;
    }
}
