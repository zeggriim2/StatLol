<?php

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpKernel\KernelInterface;

class Init extends Command
{

    private KernelInterface $kernel;
    public $

    /**
     * @var string|null
     */
    protected static $defaultName = "init:init";
    protected function configure()
    {
        $this
            ->addArgument("type", InputArgument::IS_ARRAY, "", ["all"])
            ->setHelp("Initie l'entité Queue");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $type = $input->getArgument("type");

        if($type[0] !== "all"){
            $type[] = "queue";
            $type[] = "tier";
            $type[] = "division";
        } else {
        
        }






        dd($type);
        $application = new Application($this->kernel);
        $application->setAutoExit(false);

        $inputAppli = new ArrayInput([
            "command" => "init:queue"
        ]);

        $outputAppli = new BufferedOutput();
        $application->run($inputAppli, $outputAppli);

        dd($outputAppli);

        return Command::SUCCESS;
    }

    private function compteur(array &$compteur,string $name) {
        $compteur[] = $name;
    }

    public function __construct(
        KernelInterface $kernel
    )
    {
        $this->kernel = $kernel;
        parent::__construct();
    }
}
