<?php

namespace App\Services\Extract;

use App\Services\API\LOL\SummonerApi;
use App\Repository\SummonerRepository;
use App\Services\API\LOL\Model\Summoner;
use App\Entity\Summoner as SummonerEntity;

class ExtractSummoner 
{

    private SummonerRepository $summonerRepo;
    private SummonerApi $summonerApi;

    public function __construct(
        SummonerRepository $summonerRepo,
        SummonerApi $summonerApi
    )
    {
        $this->summonerRepo = $summonerRepo;
        $this->summonerApi = $summonerApi;
    }

    public function checkInBdd(string $nameSummoner): bool
    {
        /** @var Summoner|null $summoner */
        $summonerApi = $this->summonerApi->summonerBySummonerName($nameSummoner);
        
        if ($summonerApi == null) return false;

        /** @var SummonerEntity|null $summoner */
        $summoner = $this->summonerRepo->find(["summonerId" => $summonerApi->getId()]);
        if($summoner === null) return false;
        return true;
    }
}