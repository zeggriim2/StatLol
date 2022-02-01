<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportSummoner extends Command
{
    /**
     * @var string|null
     */
    protected static $defaultName = "app:GetSummoner";
    protected function configure()
    {
        $this
            ->addArgument("nameSummoner", InputArgument::REQUIRED)
            ->setHelp("Intègre en bdd les informations du Summoner");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {


        return Command::SUCCESS;
    }
}
