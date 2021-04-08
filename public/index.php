<?php

use cursophp7\app\exceptions\AppException;
use cursophp7\app\exceptions\NotFountException;
use cursophp7\core\App;
use cursophp7\core\Request;

try{
    require_once __DIR__ . '/../core/bootstrap.php';
    App::get('router')->direct(Request::uri(), Request::method());
}catch (NotFountException $notFountException){
    die( $notFountException->getMessage());
}catch (AppException $appException){
    die( $appException->getMessage());
}
