<?php
namespace App\Http;

use Flashy\Http\Middleware\RoutingMiddlewareStack;
use Psr7Middlewares\Middleware;
use Psr7Middlewares\Middleware\AccessLog;

class MiddlewareStack extends RoutingMiddlewareStack
{
    public function loadMiddlewares() : void
    {
        $this
            ->pushMiddleware(Middleware::responseTime())
            ->pushMiddleware(Middleware::trailingSlash())
            ->pushMiddleware(Middleware::clientIp())
            ->pushMiddleware(AccessLog::class);
    }
}
