<?php

namespace App\Command;

use App\Entity\Version;
use App\Repository\VersionRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Services\API\LOL\DataDragon\ItemApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetItem extends Command
{
    private ManagerRegistry $doctrine;
    private ItemApi $itemApi;

    /**
     * @var string|null
     */
    protected static $defaultName = "app:GetItem";
    protected function configure(): void
    {
        $this
            ->setHelp("Intègre en bdd les informations de l'Item");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        // On récupère tout les versions
        /** @var VersionRepository $versionRepo **/
        $versionRepo = $this->doctrine->getRepository(Version::class);
        /** @var Version[] $versions **/
        $versions = $versionRepo->getVersionWithoutLolPatch();

        foreach ($versions as $version) {
            $items = $this->itemApi->items($version->getName(), "fr_FR");
            dd($items);
        }

        return Command::SUCCESS;
    }

    public function __construct(
        ManagerRegistry $doctrine,
        ItemApi $itemApi
    ) {
        $this->doctrine = $doctrine;
        $this->itemApi = $itemApi;
        parent::__construct();
    }
}
