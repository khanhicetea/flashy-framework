<?php
use function DI\object;
use Flashy\Http\MiddlewareStackInterface;
use Flashy\Runnable\HttpApplication;
use Flashy\ServiceProvider\HttpService;
use League\Route\RouteCollectionInterface;
use App\Http\Routing;
use App\Http\MiddlewareStack;

$app = require dirname(__DIR__).'/bootstrap/load.php';
$app->register(new HttpService(), [
    RouteCollectionInterface::class => object(Routing::class)->method('loadRoutes'),
    MiddlewareStackInterface::class => object(MiddlewareStack::class)->method('loadMiddlewares'),
]);
$app->run(HttpApplication::class);
