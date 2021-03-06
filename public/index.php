<?php
use function DI\object;
use Flashy\Http\Middleware\RoutingMiddlewareStack;
use Flashy\Http\Route\Router;
use Flashy\Runnable\HttpApplication;
use Flashy\ServiceProvider\HttpService;
use App\Http\Routing;
use App\Http\MiddlewareStack;

$app = require dirname(__DIR__).'/bootstrap/load.php';
$app->register(new HttpService(), [
    Router::class => object(Routing::class)->method('loadRoutes'),
    RoutingMiddlewareStack::class => object(MiddlewareStack::class)->method('loadMiddlewares'),
]);
$app->run(HttpApplication::class);
