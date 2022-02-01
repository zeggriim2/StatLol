<?php

namespace App\Command;

use App\Entity\Division as EntityDivision;
use App\Repository\DivisionRepository;
use App\Services\API\LOL\Model\Config\Division;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitDivision extends Command
{
    private ManagerRegistry $doctrine;
    private DivisionRepository $divisionRepository;

    /**
     * @var string|null
     */
    protected static $defaultName = "init:division";
    protected function configure(): void
    {
        $this
            ->setHelp("Initie l'entité Division");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $entityManager = $this->doctrine->getManager();
        $compteurCreate = [];
        $compteurExiste = [];

        foreach (Division::ALL_DIVISION as $division) {
            if ($this->divisionRepository->findOneBy(["name" => $division]) === null) {
                $this->compteur($compteurCreate, $division);
                $divisionEntity = (new EntityDivision())
                    ->setName($division)
                ;
                $entityManager->persist($divisionEntity);
            }
            $this->compteur($compteurExiste, $division);
        }
        $entityManager->flush();

        return Command::SUCCESS;
    }

    /**
     * @param array<string> $compteur
     * @param string $name
     * @return void
     */
    private function compteur(array &$compteur, string $name): void
    {
        $compteur[] = $name;
    }

    public function __construct(
        ManagerRegistry $doctrine,
        DivisionRepository $divisionRepository
    ) {
        $this->doctrine = $doctrine;
        $this->divisionRepository = $divisionRepository;
        parent::__construct();
    }
}
