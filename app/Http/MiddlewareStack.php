<?php
namespace App\Http;

use Flashy\Http\MiddlewareStack as FlashyMiddlewareStack;
use Psr7Middlewares\Middleware;

class MiddlewareStack extends FlashyMiddlewareStack
{
    public function loadMiddlewares() : void
    {
        $this
            ->addMiddleware(Middleware::responseTime())
            ->addMiddleware(Middleware::trailingSlash());
    }
}
