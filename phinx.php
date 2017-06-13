<?php

$app = require dirname(__FILE__).'/bootstrap/load.php';

$dsn = sprintf('%s:dbname=%s;host=%s;charset=%s', env('DB_DRIVER'), env('DB_NAME'),
    env('DB_HOST'), env('DB_CHARSET', 'utf8'));
$pdo = new PDO($dsn, env('DB_USER'), env('DB_PASSWORD'));

return [
    'paths' => [
        'migrations' => realpath(__DIR__.'/database/migrations'),
        'seeds' => realpath(__DIR__.'/database/seeds'),
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'default',
        'default' => [
            'name' => env('DB_NAME'),
            'connection' => $pdo,
        ],
    ],
];
