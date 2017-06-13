<?php
namespace App\Command;
use React\Http\Server;
use Symfony\Component\Console\Output\OutputInterface;
use Psr\Container\ContainerInterface;

class ReactServer {
    public function __invoke($port, ContainerInterface $container, OutputInterface $output) {
        $output->writeln(sprintf('Listening on port %d ...', $port));

        $container->set('http.react_port', $port);
        $server = $container->get(Server::class);
        $loop = $container->get('http.react_loop');
        $loop->run();
    }
}
