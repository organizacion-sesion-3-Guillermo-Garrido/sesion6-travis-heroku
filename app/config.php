<?php

use Monolog\Logger;

return [
    'database' => [
        'name' => 'cursophp7',
        'username' => 'userCurso',
        'password' => '123',
        'connection' => 'mysql:host=guillermo-garrido.localhost',
        'options' =>  [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
        ]
    ],
    'logs' => [
        'filename' => 'curso.log',
        'level' => Logger::WARNING
    ],
    'routes' => [
        'filename' => 'routes.php'
    ],
    'project' => [
        'name' => 'cursophp7'
    ],
    'mail' => [
        'smtp_server' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_security' => 'tls',
        'username' => 'Secret@gmail.com',
        'password' => 'Secret',
        'email' => 'guillermo@garrido.com',
        'name' => 'Guillermo Garrido'
    ]
];
?>