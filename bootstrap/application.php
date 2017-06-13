<?php
use Flashy\App;
use Flashy\ServiceProvider\LogService;
use Flashy\ServiceProvider\TwigService;
use Flashy\ServiceProvider\EloquentService;

$app = new App();
$app->register(new LogService(), [
    'logger.name' => 'TestFlashy',
    'logger.stream' => storage_path('logs/debug.log'),
]);
$app->register(new TwigService(), [
    'twig.path' => resources_path('views'),
]);
$app->register(new EloquentService(), [
    'db.connection' => [
        'driver' => env('DB_DRIVER', 'mysql'),
        'host' => env('DB_HOST', 'localhost'),
        'database' => env('DB_NAME', null),
        'username' => env('DB_USER', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset' => env('DB_CHARSET', 'utf8'),
        'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
        'prefix' => null,
    ],
]);

return $app;
