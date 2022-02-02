<?php

namespace App\Command;

use App\Entity\Summoner;
use App\Services\API\LOL\SummonerApi;
use App\Repository\SummonerRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetSummoner extends Command
{
    private SummonerRepository $summonerRepository;
    private ManagerRegistry $doctrine;
    private SummonerApi $summonerApi;

    /**
     * @var string|null
     */
    protected static $defaultName = "app:GetSummoner";
    protected function configure(): void
    {
        $this
            ->addArgument("nameSummoner", InputArgument::REQUIRED, "Nom d'invocateur sur League Of Legends")
            ->setHelp("Intègre en bdd les informations du Summoner");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $nameSumonner = $input->getArgument("nameSummoner");

        $summonerApi  = $this->summonerApi->summonerBySummonerName($nameSumonner);

        if ($summonerApi === null) {
            $io->error("$nameSumonner est introuvable !!!"); // TODO
            return Command::FAILURE;
        }

        $entityManager = $this->doctrine->getManager();

        /** @var Summoner|null $summoner */
        $summoner = $this->summonerRepository->findOneBy(['summonerId' => $summonerApi->getId()]);
        if ($summoner === null) {
            $summoner = new Summoner();
            $summoner
                ->setSummonerId($summonerApi->getId())
                ->setAccountId($summonerApi->getAccountId())
                ->setName($summonerApi->getName())
                ->setProfileIconId($summonerApi->getProfileIconId())
                ->setPuuid($summonerApi->getPuuid())
            ;
            $io->success("$nameSumonner à été créé en BDD !!");
        } else {
            $summoner
                ->setSummonerId($summonerApi->getId())
                ->setAccountId($summonerApi->getAccountId())
                ->setName($summonerApi->getName())
                ->setProfileIconId($summonerApi->getProfileIconId())
                ->setPuuid($summonerApi->getPuuid())
            ;

            $io->success("$nameSumonner (ID : {$summoner->getId()}) à été mis à jour en BDD !!");
        }
        $entityManager->persist($summoner);
        $entityManager->flush();

        return Command::SUCCESS;
    }

    public function __construct(
        SummonerRepository $summonerRepository,
        ManagerRegistry $doctrine,
        SummonerApi $summonerApi
    ) {
        $this->summonerRepository = $summonerRepository;
        $this->doctrine = $doctrine;
        $this->summonerApi = $summonerApi;
        parent::__construct();
    }
}
