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

    /**
     * @var string|null
     */
    protected static $defaultName = "init:init";
    protected function configure(): void
    {
        $this
            ->addArgument("types", InputArgument::IS_ARRAY, "", ["all"])
            ->setHelp("Initie l'entité Queue");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $types = $input->getArgument("types");


        if ($types[0] !== "all") {
            $type[] = "queue";
            $type[] = "tier";
            $type[] = "division";
        } else {
            foreach ($types as $type) {
                $namespace = "App\Command\Init" . trim(ucfirst($type));
                if (class_exists($namespace)) {
                    $this->executeCommand($type);
                }
            }
        }
        return Command::SUCCESS;
    }

    private function executeCommand(string $type): void
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);

        $inputAppli = new ArrayInput([
            "command" => "init:$type"
        ]);

        $outputAppli = new BufferedOutput();
        $application->run($inputAppli, $outputAppli);
    }


    public function __construct(
        KernelInterface $kernel
    ) {
        $this->kernel = $kernel;
        parent::__construct();
    }
}
