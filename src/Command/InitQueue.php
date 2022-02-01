<?php

namespace App\Command;

use App\Entity\Queue as EntityQueue;
use App\Repository\QueueRepository;
use App\Services\API\LOL\Model\Config\Queue;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry as DoctrineManagerRegistry;

class InitQueue extends Command
{

    private DoctrineManagerRegistry $doctrine;
    private QueueRepository $queueRepository;

    /**
     * @var string|null
     */
    protected static $defaultName = "init:queue";
    protected function configure()
    {
        $this
            ->setHelp("Initie l'entité Queue");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $entityManager = $this->doctrine->getManager();
        $compteurCreate = [];
        $compteurExiste = [];

        foreach (Queue::ALL_QEUEUES as $queue) {
            if($this->queueRepository->findOneBy(["name" => $queue]) === null) {
                $this->compteur($compteurCreate, $queue);
                $queueEntity = (new EntityQueue())
                    ->setName($queue)
                ;
                $entityManager->persist($queueEntity);
            }
            $this->compteur($compteurExiste,$queue);
        }       
        $entityManager->flush();

        return Command::SUCCESS;
    }

    private function compteur(array &$compteur,string $name) {
        $compteur[] = $name;
    }

    public function __construct(
        ManagerRegistry $doctrine,
        QueueRepository $queueRepository
    )
    {
        $this->doctrine = $doctrine;
        $this->queueRepository = $queueRepository;
        parent::__construct();
    }
}
