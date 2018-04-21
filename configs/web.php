<?php

$baseDir = dirname(__DIR__);

return [
    'controllersNamespace' => 'app\controllers',
    'defaults' => [
        'controller' => 'index',
        'action' => 'index'
    ],
    'viewsPath' =>  "{$baseDir}/app/views",
    'loginPage' => 'admin',
    'filesStorage' => "{$baseDir}/public/upload/"
];