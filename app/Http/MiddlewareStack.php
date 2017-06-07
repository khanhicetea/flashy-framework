<?php
namespace App\Http;

use Flashy\Http\AbstractMiddlewareStack;
use Psr7Middlewares\Middleware;

class MiddlewareStack extends AbstractMiddlewareStack
{
    public function loadMiddlewares() : void
    {
        $this
            ->addMiddleware(Middleware::responseTime())
            ->addMiddleware(Middleware::trailingSlash());
    }
}
