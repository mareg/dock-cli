<?php

namespace Dock\Cli;

use Dock\Cli\IO\ConsoleUserInteraction;
use Dock\Dinghy\DinghyCli;
use Dock\Installer\InteractiveProcessRunner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RestartCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('docker:restart')
            ->setDescription('Restart Docker')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userInteraction = new ConsoleUserInteraction($input, $output);
        $processRunner = new InteractiveProcessRunner($userInteraction);
        $dinghy = new DinghyCli($processRunner);

        if ($dinghy->isRunning()) {
            $dinghy->stop();
        }

        $dinghy->start();
    }
}
