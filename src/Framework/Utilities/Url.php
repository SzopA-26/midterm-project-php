<?php

namespace App\Framework\Utilities;

class Url
{
    public static function getFullPath($path = null)
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        if ($path) {
            $domainName .= substr($path, 0, 1) === '/' ? '' : '/';
            $domainName .= $path;
        }
        return $protocol . $domainName;
    }
}