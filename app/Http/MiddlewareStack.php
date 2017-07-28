<?php
namespace App\Http;

use Flashy\Http\MiddlewareStack as FlashyMiddlewareStack;
use Psr7Middlewares\Middleware;
use Psr7Middlewares\Middleware\AccessLog;

class MiddlewareStack extends FlashyMiddlewareStack
{
    public function loadMiddlewares() : void
    {
        $container = $this->getContainer();

        $this
            ->addMiddleware(Middleware::responseTime())
            ->addMiddleware(Middleware::trailingSlash())
            ->addMiddleware($container->get(AccessLog::class))
            ->addMiddleware(Middleware::clientIp());
    }
}
