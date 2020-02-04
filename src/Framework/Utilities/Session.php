<?php

namespace App\Framework\Utilities;

class Session
{
    private static function _init()
    {
        if (!session_id()) {
            session_start();
        }
    }

    public static function write($key, $value) {
        self::_init();
        $_SESSION[$key] = $value;
    }

    public static function read($key, $default=false) {
        self::_init();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public static function all()
    {
        self::_init();
        return $_SESSION;
    }

    public static function getSessionId() {
        self::_init();
        return session_id();
    }

    public static function delete($key) {
        self::_init();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroy() {
        self::_init();
        $_SESSION = [];
        session_destroy();
    }
}