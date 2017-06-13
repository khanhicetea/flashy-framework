<?php
namespace App\Command;

use Symfony\Component\Console\Output\OutputInterface;

class Hello
{
    public function __invoke($name, OutputInterface $output)
    {
        $output->writeln('Hello ' .$name);
    }
}
