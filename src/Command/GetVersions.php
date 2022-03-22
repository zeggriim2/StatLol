<?php

namespace App\Command;

use App\Entity\Version;
use App\Repository\VersionRepository;
use App\Services\API\LOL\DataDragon\GeneralApi;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetVersions extends Command
{
    private VersionRepository $versionRepository;
    private ManagerRegistry $doctrine;
    private GeneralApi $generalApi;

    /**
     * @var string|null
     */
    protected static $defaultName = "app:GetVersions";
    protected function configure(): void
    {
        $this
            ->setDescription("Récupère toutes les versions et les intègre en BDD.")
            ->setHelp("Intègre en bdd les toutes les versions");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $versionsApi  = $this->generalApi->versions();

        if ($versionsApi === null) {
            $io->error("Erreur aucune verions n'a été trouvé !!!"); // TODO
            return Command::FAILURE;
        }

        $entityManager = $this->doctrine->getManager();

        $nbVersionAdd = 0;
        $versionsApi = array_reverse($versionsApi);
        foreach ($versionsApi as $versionApi) {
            $nbVersionAdd++;

            /** @var Version|null $version */
            $version = $this->versionRepository->findOneBy(['name' => $versionApi]);

            if ($version !== null) {
                continue;
            }

            $version = (new Version())
                    ->setName($versionApi)
            ;

            $entityManager->persist($version);
        }
        $io->success("$nbVersionAdd version(s) ont été ajouté en BDD");
        $entityManager->flush();

        return Command::SUCCESS;
    }

    public function __construct(
        VersionRepository $versionRepository,
        ManagerRegistry $doctrine,
        GeneralApi $generalApi
    ) {
        $this->versionRepository = $versionRepository;
        $this->doctrine = $doctrine;
        $this->generalApi = $generalApi;
        parent::__construct();
    }
}
