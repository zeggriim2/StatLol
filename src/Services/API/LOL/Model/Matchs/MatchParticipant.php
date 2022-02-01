<?php

namespace App\Services\API\LOL\Model\Matchs;

class MatchParticipant
{
    private int $assists;
    private int $baronKills;
    private int $bountyLevel;
    private int $champExperience;
    private int $champLevel;
    private int $championId;
    private string $championName;
    private int $championTransform;
    private int $consumablesPurchased;
    private int $damageDealtToBuildings;
    private int $damageDealtToObjectives;
    private int $damageDealtToTurrets;
    private int $damageSelfMitigated;
    private int $deaths;
    private int $detectorWardsPlaced;
    private int $doubleKills;
    private int $dragonKills;
    private bool $firstBloodAssist;
    private bool $firstBloodKill;
    private bool $firstTowerAssist;
    private bool $firstTowerKill;
    private bool $gameEndedInEarlySurrender;
    private bool $gameEndedInSurrender;
    private int $goldEarned;
    private int $goldSpent;
    private string $individualPosition;
    private int $inhibitorKills;
    private int $inhibitorTakedowns;
    private int $inhibitorsLost;
    private int $item0;
    private int $item1;
    private int $item2;
    private int $item3;
    private int $item4;
    private int $item5;
    private int $item6;
    private int $itemsPurchased;
    private int $killingSprees;
    private int $kills;
    private string $lane;
    private int $largestCriticalStrike;
    private int $largestKillingSpree;
    private int $largestMultiKill;
    private int $longestTimeSpentLiving;
    private int $magicDamageDealt;
    private int $magicDamageDealtToChampions;
    private int $magicDamageTaken;
    private int $neutralMinionsKilled;
    private int $nexusKills;
    private int $nexusLost;
    private int $nexusTakedowns;
    private int $objectivesStolen;
    private int $objectivesStolenAssists;
    private int $participantId;
    private int $pentaKills;
    private MatchPerk $perks;
    private int $physicalDamageDealt;
    private int $physicalDamageDealtToChampions;
    private int $physicalDamageTaken;
    private int $profileIcon;
    private string $puuid;
    private int $quadraKills;
    private string $riotIdName;
    private string $riotIdTagline;
    private string $role;
    private int $sightWardsBoughtInGame;
    private int $spell1Casts;
    private int $spell2Casts;
    private int $spell3Casts;
    private int $spell4Casts;
    private int $summoner1Casts;
    private int $summoner1Id;
    private int $summoner2Casts;
    private int $summoner2Id;
    private string $summonerId;
    private int $summonerLevel;
    private string $summonerName;
    private bool $teamEarlySurrendered;
    private int $teamId;
    private string $teamPosition;
    private int $timeCCingOthers;
    private int $timePlayed;
    private int $totalDamageDealt;
    private int $totalDamageDealtToChampions;
    private int $totalDamageShieldedOnTeammates;
    private int $totalDamageTaken;
    private int $totalHeal;
    private int $totalHealsOnTeammates;
    private int $totalMinionsKilled;
    private int $totalTimeCCDealt;
    private int $totalTimeSpentDead;
    private int $totalUnitsHealed;
    private int $tripleKills;
    private int $trueDamageDealt;
    private int $trueDamageDealtToChampions;
    private int $trueDamageTaken;
    private int $turretKills;
    private int $turretTakedowns;
    private int $turretsLost;
    private int $unrealKills;
    private int $visionScore;
    private int $visionWardsBoughtInGame;
    private int $wardsKilled;
    private int $wardsPlaced;
    private bool $win;

    public function getAssists(): int
    {
        return $this->assists;
    }

    public function setAssists(int $assists): MatchParticipant
    {
        $this->assists = $assists;
        return $this;
    }

    public function getBaronKills(): int
    {
        return $this->baronKills;
    }

    public function setBaronKills(int $baronKills): MatchParticipant
    {
        $this->baronKills = $baronKills;
        return $this;
    }

    public function getBountyLevel(): int
    {
        return $this->bountyLevel;
    }

    public function setBountyLevel(int $bountyLevel): MatchParticipant
    {
        $this->bountyLevel = $bountyLevel;
        return $this;
    }

    public function getChampExperience(): int
    {
        return $this->champExperience;
    }

    public function setChampExperience(int $champExperience): MatchParticipant
    {
        $this->champExperience = $champExperience;
        return $this;
    }

    public function getChampLevel(): int
    {
        return $this->champLevel;
    }

    public function setChampLevel(int $champLevel): MatchParticipant
    {
        $this->champLevel = $champLevel;
        return $this;
    }

    public function getChampionId(): int
    {
        return $this->championId;
    }

    public function setChampionId(int $championId): MatchParticipant
    {
        $this->championId = $championId;
        return $this;
    }

    public function getChampionName(): string
    {
        return $this->championName;
    }

    public function setChampionName(string $championName): MatchParticipant
    {
        $this->championName = $championName;
        return $this;
    }

    public function getChampionTransform(): int
    {
        return $this->championTransform;
    }

    public function setChampionTransform(int $championTransform): MatchParticipant
    {
        $this->championTransform = $championTransform;
        return $this;
    }

    public function getConsumablesPurchased(): int
    {
        return $this->consumablesPurchased;
    }

    public function setConsumablesPurchased(int $consumablesPurchased): MatchParticipant
    {
        $this->consumablesPurchased = $consumablesPurchased;
        return $this;
    }

    public function getDamageDealtToBuildings(): int
    {
        return $this->damageDealtToBuildings;
    }

    public function setDamageDealtToBuildings(int $damageDealtToBuildings): MatchParticipant
    {
        $this->damageDealtToBuildings = $damageDealtToBuildings;
        return $this;
    }

    public function getDamageDealtToObjectives(): int
    {
        return $this->damageDealtToObjectives;
    }

    public function setDamageDealtToObjectives(int $damageDealtToObjectives): MatchParticipant
    {
        $this->damageDealtToObjectives = $damageDealtToObjectives;
        return $this;
    }

    public function getDamageDealtToTurrets(): int
    {
        return $this->damageDealtToTurrets;
    }

    public function setDamageDealtToTurrets(int $damageDealtToTurrets): MatchParticipant
    {
        $this->damageDealtToTurrets = $damageDealtToTurrets;
        return $this;
    }

    public function getDamageSelfMitigated(): int
    {
        return $this->damageSelfMitigated;
    }

    public function setDamageSelfMitigated(int $damageSelfMitigated): MatchParticipant
    {
        $this->damageSelfMitigated = $damageSelfMitigated;
        return $this;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function setDeaths(int $deaths): MatchParticipant
    {
        $this->deaths = $deaths;
        return $this;
    }

    public function getDetectorWardsPlaced(): int
    {
        return $this->detectorWardsPlaced;
    }

    public function setDetectorWardsPlaced(int $detectorWardsPlaced): MatchParticipant
    {
        $this->detectorWardsPlaced = $detectorWardsPlaced;
        return $this;
    }

    public function getDoubleKills(): int
    {
        return $this->doubleKills;
    }

    public function setDoubleKills(int $doubleKills): MatchParticipant
    {
        $this->doubleKills = $doubleKills;
        return $this;
    }

    public function getDragonKills(): int
    {
        return $this->dragonKills;
    }

    public function setDragonKills(int $dragonKills): MatchParticipant
    {
        $this->dragonKills = $dragonKills;
        return $this;
    }

    public function isFirstBloodAssist(): bool
    {
        return $this->firstBloodAssist;
    }

    public function setFirstBloodAssist(bool $firstBloodAssist): MatchParticipant
    {
        $this->firstBloodAssist = $firstBloodAssist;
        return $this;
    }

    public function isFirstBloodKill(): bool
    {
        return $this->firstBloodKill;
    }

    public function setFirstBloodKill(bool $firstBloodKill): MatchParticipant
    {
        $this->firstBloodKill = $firstBloodKill;
        return $this;
    }

    public function isFirstTowerAssist(): bool
    {
        return $this->firstTowerAssist;
    }

    public function setFirstTowerAssist(bool $firstTowerAssist): MatchParticipant
    {
        $this->firstTowerAssist = $firstTowerAssist;
        return $this;
    }

    public function isFirstTowerKill(): bool
    {
        return $this->firstTowerKill;
    }

    public function setFirstTowerKill(bool $firstTowerKill): MatchParticipant
    {
        $this->firstTowerKill = $firstTowerKill;
        return $this;
    }

    public function isGameEndedInEarlySurrender(): bool
    {
        return $this->gameEndedInEarlySurrender;
    }

    public function setGameEndedInEarlySurrender(bool $gameEndedInEarlySurrender): MatchParticipant
    {
        $this->gameEndedInEarlySurrender = $gameEndedInEarlySurrender;
        return $this;
    }

    public function isGameEndedInSurrender(): bool
    {
        return $this->gameEndedInSurrender;
    }

    public function setGameEndedInSurrender(bool $gameEndedInSurrender): MatchParticipant
    {
        $this->gameEndedInSurrender = $gameEndedInSurrender;
        return $this;
    }

    public function getGoldEarned(): int
    {
        return $this->goldEarned;
    }

    public function setGoldEarned(int $goldEarned): MatchParticipant
    {
        $this->goldEarned = $goldEarned;
        return $this;
    }

    public function getGoldSpent(): int
    {
        return $this->goldSpent;
    }

    public function setGoldSpent(int $goldSpent): MatchParticipant
    {
        $this->goldSpent = $goldSpent;
        return $this;
    }

    public function getIndividualPosition(): string
    {
        return $this->individualPosition;
    }

    public function setIndividualPosition(string $individualPosition): MatchParticipant
    {
        $this->individualPosition = $individualPosition;
        return $this;
    }

    public function getInhibitorKills(): int
    {
        return $this->inhibitorKills;
    }

    public function setInhibitorKills(int $inhibitorKills): MatchParticipant
    {
        $this->inhibitorKills = $inhibitorKills;
        return $this;
    }

    public function getInhibitorTakedowns(): int
    {
        return $this->inhibitorTakedowns;
    }

    public function setInhibitorTakedowns(int $inhibitorTakedowns): MatchParticipant
    {
        $this->inhibitorTakedowns = $inhibitorTakedowns;
        return $this;
    }

    public function getInhibitorsLost(): int
    {
        return $this->inhibitorsLost;
    }

    public function setInhibitorsLost(int $inhibitorsLost): MatchParticipant
    {
        $this->inhibitorsLost = $inhibitorsLost;
        return $this;
    }

    public function getItem0(): int
    {
        return $this->item0;
    }

    public function setItem0(int $item0): MatchParticipant
    {
        $this->item0 = $item0;
        return $this;
    }

    public function getItem1(): int
    {
        return $this->item1;
    }

    public function setItem1(int $item1): MatchParticipant
    {
        $this->item1 = $item1;
        return $this;
    }

    public function getItem2(): int
    {
        return $this->item2;
    }

    public function setItem2(int $item2): MatchParticipant
    {
        $this->item2 = $item2;
        return $this;
    }

    public function getItem3(): int
    {
        return $this->item3;
    }

    public function setItem3(int $item3): MatchParticipant
    {
        $this->item3 = $item3;
        return $this;
    }

    public function getItem4(): int
    {
        return $this->item4;
    }

    public function setItem4(int $item4): MatchParticipant
    {
        $this->item4 = $item4;
        return $this;
    }

    public function getItem5(): int
    {
        return $this->item5;
    }

    public function setItem5(int $item5): MatchParticipant
    {
        $this->item5 = $item5;
        return $this;
    }

    public function getItem6(): int
    {
        return $this->item6;
    }

    public function setItem6(int $item6): MatchParticipant
    {
        $this->item6 = $item6;
        return $this;
    }

    public function getItemsPurchased(): int
    {
        return $this->itemsPurchased;
    }

    public function setItemsPurchased(int $itemsPurchased): MatchParticipant
    {
        $this->itemsPurchased = $itemsPurchased;
        return $this;
    }

    public function getKillingSprees(): int
    {
        return $this->killingSprees;
    }

    public function setKillingSprees(int $killingSprees): MatchParticipant
    {
        $this->killingSprees = $killingSprees;
        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): MatchParticipant
    {
        $this->kills = $kills;
        return $this;
    }

    public function getLane(): string
    {
        return $this->lane;
    }

    public function setLane(string $lane): MatchParticipant
    {
        $this->lane = $lane;
        return $this;
    }

    public function getLargestCriticalStrike(): int
    {
        return $this->largestCriticalStrike;
    }

    public function setLargestCriticalStrike(int $largestCriticalStrike): MatchParticipant
    {
        $this->largestCriticalStrike = $largestCriticalStrike;
        return $this;
    }

    public function getLargestKillingSpree(): int
    {
        return $this->largestKillingSpree;
    }

    public function setLargestKillingSpree(int $largestKillingSpree): MatchParticipant
    {
        $this->largestKillingSpree = $largestKillingSpree;
        return $this;
    }

    public function getLargestMultiKill(): int
    {
        return $this->largestMultiKill;
    }

    public function setLargestMultiKill(int $largestMultiKill): MatchParticipant
    {
        $this->largestMultiKill = $largestMultiKill;
        return $this;
    }

    public function getLongestTimeSpentLiving(): int
    {
        return $this->longestTimeSpentLiving;
    }

    public function setLongestTimeSpentLiving(int $longestTimeSpentLiving): MatchParticipant
    {
        $this->longestTimeSpentLiving = $longestTimeSpentLiving;
        return $this;
    }

    public function getMagicDamageDealt(): int
    {
        return $this->magicDamageDealt;
    }

    public function setMagicDamageDealt(int $magicDamageDealt): MatchParticipant
    {
        $this->magicDamageDealt = $magicDamageDealt;
        return $this;
    }

    public function getMagicDamageDealtToChampions(): int
    {
        return $this->magicDamageDealtToChampions;
    }

    public function setMagicDamageDealtToChampions(int $magicDamageDealtToChampions): MatchParticipant
    {
        $this->magicDamageDealtToChampions = $magicDamageDealtToChampions;
        return $this;
    }

    public function getMagicDamageTaken(): int
    {
        return $this->magicDamageTaken;
    }

    public function setMagicDamageTaken(int $magicDamageTaken): MatchParticipant
    {
        $this->magicDamageTaken = $magicDamageTaken;
        return $this;
    }

    public function getNeutralMinionsKilled(): int
    {
        return $this->neutralMinionsKilled;
    }

    public function setNeutralMinionsKilled(int $neutralMinionsKilled): MatchParticipant
    {
        $this->neutralMinionsKilled = $neutralMinionsKilled;
        return $this;
    }

    public function getNexusKills(): int
    {
        return $this->nexusKills;
    }

    public function setNexusKills(int $nexusKills): MatchParticipant
    {
        $this->nexusKills = $nexusKills;
        return $this;
    }

    public function getNexusLost(): int
    {
        return $this->nexusLost;
    }

    public function setNexusLost(int $nexusLost): MatchParticipant
    {
        $this->nexusLost = $nexusLost;
        return $this;
    }

    public function getNexusTakedowns(): int
    {
        return $this->nexusTakedowns;
    }

    public function setNexusTakedowns(int $nexusTakedowns): MatchParticipant
    {
        $this->nexusTakedowns = $nexusTakedowns;
        return $this;
    }

    public function getObjectivesStolen(): int
    {
        return $this->objectivesStolen;
    }

    public function setObjectivesStolen(int $objectivesStolen): MatchParticipant
    {
        $this->objectivesStolen = $objectivesStolen;
        return $this;
    }

    public function getObjectivesStolenAssists(): int
    {
        return $this->objectivesStolenAssists;
    }

    public function setObjectivesStolenAssists(int $objectivesStolenAssists): MatchParticipant
    {
        $this->objectivesStolenAssists = $objectivesStolenAssists;
        return $this;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function setParticipantId(int $participantId): MatchParticipant
    {
        $this->participantId = $participantId;
        return $this;
    }

    public function getPentaKills(): int
    {
        return $this->pentaKills;
    }

    public function setPentaKills(int $pentaKills): MatchParticipant
    {
        $this->pentaKills = $pentaKills;
        return $this;
    }

    public function getPerks(): MatchPerk
    {
        return $this->perks;
    }

    public function setPerks(MatchPerk $perks): MatchParticipant
    {
        $this->perks = $perks;
        return $this;
    }

    public function getPhysicalDamageDealt(): int
    {
        return $this->physicalDamageDealt;
    }

    public function setPhysicalDamageDealt(int $physicalDamageDealt): MatchParticipant
    {
        $this->physicalDamageDealt = $physicalDamageDealt;
        return $this;
    }

    public function getPhysicalDamageDealtToChampions(): int
    {
        return $this->physicalDamageDealtToChampions;
    }

    public function setPhysicalDamageDealtToChampions(int $physicalDamageDealtToChampions): MatchParticipant
    {
        $this->physicalDamageDealtToChampions = $physicalDamageDealtToChampions;
        return $this;
    }

    public function getPhysicalDamageTaken(): int
    {
        return $this->physicalDamageTaken;
    }

    public function setPhysicalDamageTaken(int $physicalDamageTaken): MatchParticipant
    {
        $this->physicalDamageTaken = $physicalDamageTaken;
        return $this;
    }

    public function getProfileIcon(): int
    {
        return $this->profileIcon;
    }

    public function setProfileIcon(int $profileIcon): MatchParticipant
    {
        $this->profileIcon = $profileIcon;
        return $this;
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function setPuuid(string $puuid): MatchParticipant
    {
        $this->puuid = $puuid;
        return $this;
    }

    public function getQuadraKills(): int
    {
        return $this->quadraKills;
    }

    public function setQuadraKills(int $quadraKills): MatchParticipant
    {
        $this->quadraKills = $quadraKills;
        return $this;
    }

    public function getRiotIdName(): string
    {
        return $this->riotIdName;
    }

    public function setRiotIdName(string $riotIdName): MatchParticipant
    {
        $this->riotIdName = $riotIdName;
        return $this;
    }

    public function getRiotIdTagline(): string
    {
        return $this->riotIdTagline;
    }

    public function setRiotIdTagline(string $riotIdTagline): MatchParticipant
    {
        $this->riotIdTagline = $riotIdTagline;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): MatchParticipant
    {
        $this->role = $role;
        return $this;
    }

    public function getSightWardsBoughtInGame(): int
    {
        return $this->sightWardsBoughtInGame;
    }

    public function setSightWardsBoughtInGame(int $sightWardsBoughtInGame): MatchParticipant
    {
        $this->sightWardsBoughtInGame = $sightWardsBoughtInGame;
        return $this;
    }

    public function getSpell1Casts(): int
    {
        return $this->spell1Casts;
    }

    public function setSpell1Casts(int $spell1Casts): MatchParticipant
    {
        $this->spell1Casts = $spell1Casts;
        return $this;
    }

    public function getSpell2Casts(): int
    {
        return $this->spell2Casts;
    }

    public function setSpell2Casts(int $spell2Casts): MatchParticipant
    {
        $this->spell2Casts = $spell2Casts;
        return $this;
    }

    public function getSpell3Casts(): int
    {
        return $this->spell3Casts;
    }

    public function setSpell3Casts(int $spell3Casts): MatchParticipant
    {
        $this->spell3Casts = $spell3Casts;
        return $this;
    }

    public function getSpell4Casts(): int
    {
        return $this->spell4Casts;
    }

    public function setSpell4Casts(int $spell4Casts): MatchParticipant
    {
        $this->spell4Casts = $spell4Casts;
        return $this;
    }

    public function getSummoner1Casts(): int
    {
        return $this->summoner1Casts;
    }

    public function setSummoner1Casts(int $summoner1Casts): MatchParticipant
    {
        $this->summoner1Casts = $summoner1Casts;
        return $this;
    }

    public function getSummoner1Id(): int
    {
        return $this->summoner1Id;
    }

    public function setSummoner1Id(int $summoner1Id): MatchParticipant
    {
        $this->summoner1Id = $summoner1Id;
        return $this;
    }

    public function getSummoner2Casts(): int
    {
        return $this->summoner2Casts;
    }

    public function setSummoner2Casts(int $summoner2Casts): MatchParticipant
    {
        $this->summoner2Casts = $summoner2Casts;
        return $this;
    }

    public function getSummoner2Id(): int
    {
        return $this->summoner2Id;
    }

    public function setSummoner2Id(int $summoner2Id): MatchParticipant
    {
        $this->summoner2Id = $summoner2Id;
        return $this;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function setSummonerId(string $summonerId): MatchParticipant
    {
        $this->summonerId = $summonerId;
        return $this;
    }

    public function getSummonerLevel(): int
    {
        return $this->summonerLevel;
    }

    public function setSummonerLevel(int $summonerLevel): MatchParticipant
    {
        $this->summonerLevel = $summonerLevel;
        return $this;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function setSummonerName(string $summonerName): MatchParticipant
    {
        $this->summonerName = $summonerName;
        return $this;
    }

    public function isTeamEarlySurrendered(): bool
    {
        return $this->teamEarlySurrendered;
    }

    public function setTeamEarlySurrendered(bool $teamEarlySurrendered): MatchParticipant
    {
        $this->teamEarlySurrendered = $teamEarlySurrendered;
        return $this;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function setTeamId(int $teamId): MatchParticipant
    {
        $this->teamId = $teamId;
        return $this;
    }

    public function getTeamPosition(): string
    {
        return $this->teamPosition;
    }

    public function setTeamPosition(string $teamPosition): MatchParticipant
    {
        $this->teamPosition = $teamPosition;
        return $this;
    }

    public function getTimeCCingOthers(): int
    {
        return $this->timeCCingOthers;
    }

    public function setTimeCCingOthers(int $timeCCingOthers): MatchParticipant
    {
        $this->timeCCingOthers = $timeCCingOthers;
        return $this;
    }

    public function getTimePlayed(): int
    {
        return $this->timePlayed;
    }

    public function setTimePlayed(int $timePlayed): MatchParticipant
    {
        $this->timePlayed = $timePlayed;
        return $this;
    }

    public function getTotalDamageDealt(): int
    {
        return $this->totalDamageDealt;
    }

    public function setTotalDamageDealt(int $totalDamageDealt): MatchParticipant
    {
        $this->totalDamageDealt = $totalDamageDealt;
        return $this;
    }

    public function getTotalDamageDealtToChampions(): int
    {
        return $this->totalDamageDealtToChampions;
    }

    public function setTotalDamageDealtToChampions(int $totalDamageDealtToChampions): MatchParticipant
    {
        $this->totalDamageDealtToChampions = $totalDamageDealtToChampions;
        return $this;
    }

    public function getTotalDamageShieldedOnTeammates(): int
    {
        return $this->totalDamageShieldedOnTeammates;
    }

    public function setTotalDamageShieldedOnTeammates(int $totalDamageShieldedOnTeammates): MatchParticipant
    {
        $this->totalDamageShieldedOnTeammates = $totalDamageShieldedOnTeammates;
        return $this;
    }

    public function getTotalDamageTaken(): int
    {
        return $this->totalDamageTaken;
    }

    public function setTotalDamageTaken(int $totalDamageTaken): MatchParticipant
    {
        $this->totalDamageTaken = $totalDamageTaken;
        return $this;
    }

    public function getTotalHeal(): int
    {
        return $this->totalHeal;
    }

    public function setTotalHeal(int $totalHeal): MatchParticipant
    {
        $this->totalHeal = $totalHeal;
        return $this;
    }

    public function getTotalHealsOnTeammates(): int
    {
        return $this->totalHealsOnTeammates;
    }

    public function setTotalHealsOnTeammates(int $totalHealsOnTeammates): MatchParticipant
    {
        $this->totalHealsOnTeammates = $totalHealsOnTeammates;
        return $this;
    }

    public function getTotalMinionsKilled(): int
    {
        return $this->totalMinionsKilled;
    }

    public function setTotalMinionsKilled(int $totalMinionsKilled): MatchParticipant
    {
        $this->totalMinionsKilled = $totalMinionsKilled;
        return $this;
    }

    public function getTotalTimeCCDealt(): int
    {
        return $this->totalTimeCCDealt;
    }

    public function setTotalTimeCCDealt(int $totalTimeCCDealt): MatchParticipant
    {
        $this->totalTimeCCDealt = $totalTimeCCDealt;
        return $this;
    }

    public function getTotalTimeSpentDead(): int
    {
        return $this->totalTimeSpentDead;
    }

    public function setTotalTimeSpentDead(int $totalTimeSpentDead): MatchParticipant
    {
        $this->totalTimeSpentDead = $totalTimeSpentDead;
        return $this;
    }

    public function getTotalUnitsHealed(): int
    {
        return $this->totalUnitsHealed;
    }

    public function setTotalUnitsHealed(int $totalUnitsHealed): MatchParticipant
    {
        $this->totalUnitsHealed = $totalUnitsHealed;
        return $this;
    }

    public function getTripleKills(): int
    {
        return $this->tripleKills;
    }

    public function setTripleKills(int $tripleKills): MatchParticipant
    {
        $this->tripleKills = $tripleKills;
        return $this;
    }

    public function getTrueDamageDealt(): int
    {
        return $this->trueDamageDealt;
    }

    public function setTrueDamageDealt(int $trueDamageDealt): MatchParticipant
    {
        $this->trueDamageDealt = $trueDamageDealt;
        return $this;
    }

    public function getTrueDamageDealtToChampions(): int
    {
        return $this->trueDamageDealtToChampions;
    }

    public function setTrueDamageDealtToChampions(int $trueDamageDealtToChampions): MatchParticipant
    {
        $this->trueDamageDealtToChampions = $trueDamageDealtToChampions;
        return $this;
    }

    public function getTrueDamageTaken(): int
    {
        return $this->trueDamageTaken;
    }

    public function setTrueDamageTaken(int $trueDamageTaken): MatchParticipant
    {
        $this->trueDamageTaken = $trueDamageTaken;
        return $this;
    }

    public function getTurretKills(): int
    {
        return $this->turretKills;
    }

    public function setTurretKills(int $turretKills): MatchParticipant
    {
        $this->turretKills = $turretKills;
        return $this;
    }

    public function getTurretTakedowns(): int
    {
        return $this->turretTakedowns;
    }

    public function setTurretTakedowns(int $turretTakedowns): MatchParticipant
    {
        $this->turretTakedowns = $turretTakedowns;
        return $this;
    }

    public function getTurretsLost(): int
    {
        return $this->turretsLost;
    }

    public function setTurretsLost(int $turretsLost): MatchParticipant
    {
        $this->turretsLost = $turretsLost;
        return $this;
    }

    public function getUnrealKills(): int
    {
        return $this->unrealKills;
    }

    public function setUnrealKills(int $unrealKills): MatchParticipant
    {
        $this->unrealKills = $unrealKills;
        return $this;
    }

    public function getVisionScore(): int
    {
        return $this->visionScore;
    }

    public function setVisionScore(int $visionScore): MatchParticipant
    {
        $this->visionScore = $visionScore;
        return $this;
    }

    public function getVisionWardsBoughtInGame(): int
    {
        return $this->visionWardsBoughtInGame;
    }

    public function setVisionWardsBoughtInGame(int $visionWardsBoughtInGame): MatchParticipant
    {
        $this->visionWardsBoughtInGame = $visionWardsBoughtInGame;
        return $this;
    }

    public function getWardsKilled(): int
    {
        return $this->wardsKilled;
    }

    public function setWardsKilled(int $wardsKilled): MatchParticipant
    {
        $this->wardsKilled = $wardsKilled;
        return $this;
    }

    public function getWardsPlaced(): int
    {
        return $this->wardsPlaced;
    }

    public function setWardsPlaced(int $wardsPlaced): MatchParticipant
    {
        $this->wardsPlaced = $wardsPlaced;
        return $this;
    }

    public function isWin(): bool
    {
        return $this->win;
    }

    public function setWin(bool $win): MatchParticipant
    {
        $this->win = $win;
        return $this;
    }
}
