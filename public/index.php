<?php

error_reporting(E_ALL);

require_once __DIR__ . '/../components/Autoload.php';
spl_autoload_register([new \components\Autoload(dirname(__DIR__)), 'load']);

$config = array_merge(
    require_once __DIR__ . '/../configs/main.php',
    require_once __DIR__ . '/../configs/web.php'
);
echo (new components\web\Application($config))->run();
