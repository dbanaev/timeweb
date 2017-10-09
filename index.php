<?php

require __DIR__ . '/autoload.php';

$parts =  explode('/', $_SERVER['REQUEST_URI']);

$controllerName = ucfirst($parts[1]) ?: 'Index';
$controllerClassName = '\\App\\Controllers\\' . $controllerName;

$actionName = ucfirst($parts[2]) ?: 'Index';

try  {
    $controller = new $controllerClassName;
    $controller->action($actionName);
} catch (\App\Exceptions\E404 $e) {
    header('Not found', true, 404);
    echo $e->getMessage();
} catch (\App\Exceptions\Db $e) {
    echo $e->getMessage();
}