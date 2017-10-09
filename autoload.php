<?php

function __autoload($class)
{
    $file = __DIR__ . '/' .str_replace('\\', '/', $class) . '.php';

    if (!file_exists($file)) {
        header('Not found', true, 404);
        die('Страница не найдена');
    }

    require $file;
}