<?php

use cursophp7\app\utils\MyLog;
use cursophp7\app\utils\MyMail;
use cursophp7\core\App;
use cursophp7\core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind('config', $config);

$router = Router::load(__DIR__ . '/../app/' . $config['routes']['filename']);
App::bind('router',$router);

$logger =MyLog::load(__DIR__ . '/../logs/' . $config['logs']['filename'], $config['logs']['level']);
App::bind('logger',$logger);

$mailer =MyMail::load($config['mail']['smtp_server'], $config['mail']['smtp_port'], $config['mail']['smtp_security'],
    $config['mail']['username'], $config['mail']['password'], $config['mail']['email'], $config['mail']['name']);
App::bind('mailer',$mailer);