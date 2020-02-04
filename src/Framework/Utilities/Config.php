<?php

namespace App\Framework\Utilities;

class Config
{
    private static $configs;

    public static function read($key, $default = null)
    {
        if (empty(self::$configs)) {
            self::$configs = [];
        }

        if (!isset(self::$configs['app'])) {
            self::$configs['app'] = include(__DIR__ . '/../../../config/app.php');
        }
        if (!isset(self::$configs['database'])) {
            self::$configs['database'] = include(__DIR__ . '/../../../config/database.php');
        }
        return DotNotation::get($key, self::$configs, $default);
    }
}