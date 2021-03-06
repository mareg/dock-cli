<?php

namespace Dock\Cli\Docker;

use Dock\Installer\DockerInstaller;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
    /**
     * @var DockerInstaller
     */
    private $dockerInstaller;

    /**
     * @param DockerInstaller $dockerInstaller
     */
    public function __construct(DockerInstaller $dockerInstaller)
    {
        parent::__construct();

        $this->dockerInstaller = $dockerInstaller;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('docker:install')
            ->setDescription('Install Docker')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->dockerInstaller->run();

        $output->writeln([
            '',
            '    The installation looks to be successful.',
            '    You may need to <comment>RESTART YOUR SHELL</comment> to refresh the environment variables.',
            '',
        ]);
    }
}
