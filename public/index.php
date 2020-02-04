<?php

/*
 * Register The Auto-Loader
 */
require __DIR__ . '/../vendor/autoload.php';

use Doctrine\Common\Inflector\Inflector;
use App\Framework\Utilities\Config;

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);
parse_str(urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)
), $queryStrings);

$uris = array_values(array_filter(explode('/',$uri), function ($data) {
    return !empty($data);
}));

$defaultController = Config::read('app.default.controller');
$defaultMethod = Config::read('app.default.method');

$controllerName = isset($uris[0]) ? array_shift($uris): $defaultController;
$methodName = isset($uris[0]) ? array_shift($uris): $defaultMethod;

$controllerName = 'App\\Controllers\\'.Inflector::classify($controllerName.'Controller');
$controller = new $controllerName($uris, $queryStrings);
$response = $controller->$methodName();
if (is_array($response) || is_object($response)) {
    echo json_encode($response);
} else {
    echo $response;
}

