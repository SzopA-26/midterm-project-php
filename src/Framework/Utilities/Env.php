<?php

namespace App\Framework\Utilities;

use Dotenv\Dotenv;

class Env
{
    private static $dotenv;

    public static function get($key)
    {
        if (!self::$dotenv) {
            self::$dotenv = Dotenv::create(__DIR__ . '/../../../');
            self::$dotenv->load();
        }
        return getenv($key);
    }
}