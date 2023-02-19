<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'secret:regenerate-app-secret',
    description: 'Regenerate a random value and update APP_SECRET',
)]
class RegenerateAppSecretCommand extends Command
{
    protected function configure(): void
    {
        $this->addArgument('envfile', InputArgument::REQUIRED, 'env File {.env, .env.local}');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $env = $input->getArgument('envfile');

        if ($env == '.env' || $env == '.env.local') {
            $io->note(sprintf('You chose to update: %s', $env));
            $secret = bin2hex(random_bytes(16));
            $filepath = realpath(dirname(__file__).'/../..') . '/' . $env;
            $io->note(sprintf('Editing file: %s', $filepath));

            shell_exec("sed -i -E 's/^APP_SECRET=.{32}$/APP_SECRET=" . $secret . "'/ ". $env);

            $io->success('New APP_SECRET was generated: ' . $secret);
            return Command::SUCCESS;
        }
        $io->error("You did not provide a valid environment file to change");
        return Command::INVALID;
    }
}