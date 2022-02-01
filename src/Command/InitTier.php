<?php

namespace App\Command;

use App\Entity\Tier as EntityTier;
use App\Repository\TierRepository;
use App\Services\API\LOL\Model\Config\Tier;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry as DoctrineManagerRegistry;

class InitTier extends Command
{

    private DoctrineManagerRegistry $doctrine;
    private TierRepository $tierRepository;

    /**
     * @var string|null
     */
    protected static $defaultName = "init:tier";
    protected function configure()
    {
        $this
            ->setHelp("Initie l'entité Tiers");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $entityManager = $this->doctrine->getManager();
        $compteurCreate = [];
        $compteurExiste = [];

        foreach (Tier::ALL_TIERS as $tier) {
            if($this->tierRepository->findOneBy(["name" => $tier]) === null) {
                $this->compteur($compteurCreate, $tier);
                $tierEntity = (new EntityTier())
                    ->setName($tier)
                ;
                $entityManager->persist($tierEntity);        
                continue;
            }
            $this->compteur($compteurExiste,$tier);
        }       
        $entityManager->flush();

        return Command::SUCCESS;
    }

    private function compteur(array &$compteur,string $name) {
        $compteur[] = $name;
    }

    public function __construct(
        ManagerRegistry $doctrine,
        TierRepository $tierRepository
    )
    {
        $this->doctrine = $doctrine;
        $this->tierRepository = $tierRepository;
        parent::__construct();
    }
}
