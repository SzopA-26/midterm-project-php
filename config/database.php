<?php
use App\Framework\Utilities\Env;

return [
    'mysql' => [
        'host' => Env::get('DB_HOST') ?? 'localhost',
        'port' => Env::get('DB_PORT') ?? 3306,
        'database' => Env::get('DB_NAME') ?? 'mydb',
        'username' => Env::get('DB_USER') ?? 'dbuser',
        'password' => Env::get('DB_PASSWORD') ?? '',
        'charset' => 'utf8',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => ''
    ]
];