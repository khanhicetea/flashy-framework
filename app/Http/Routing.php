<?php
namespace App\Http;

use League\Route\RouteCollection;
use FastRoute\DataGenerator;
use FastRoute\RouteParser;
use Psr\Container\ContainerInterface;

class Routing extends RouteCollection
{
    public function __construct(ContainerInterface $container, RouteParser $parser = null, DataGenerator $generator = null)
    {
        parent::__construct($container, $parser, $generator);
    }

    protected function to(string $controller, string $action) : array
    {
        return ['\\App\\Http\\Controller\\'.ucfirst($controller).'Controller', $action.'Action'];
    }

    public function loadRoutes()
    {
        // that = this
        $r = $this;

        // Routes defining
        $r->get('/[{name}]', $r->to('home', 'index'));

        // Return this
        return $this;
    }
}
