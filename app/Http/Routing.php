<?php
namespace App\Http;

use Flashy\Http\Route\Router;

class Routing extends Router
{
    private function to(string $controller, string $action) : array
    {
        return ['\\App\\Http\\Controller\\'.ucfirst($controller).'Controller', $action.'Action'];
    }

    public function loadRoutes()
    {
        // that = this
        $r = $this;

        // Routes defining
        $r->get('/[{name}]', $r->to('home', 'index'))->setName('index');

        // Return this
        return $this;
    }

}
