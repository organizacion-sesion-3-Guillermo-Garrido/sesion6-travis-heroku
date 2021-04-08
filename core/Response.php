<?php


namespace cursophp7\core;


class Response
{
    public static function  renderView(string $name, string $layout='layout', array $data=[]){
        extract($data);
        ob_start();
        require __DIR__ . "/../app/views/$name.view.php";
        $main_content = ob_get_clean();
        require __DIR__ . "/../app/views/$layout.view.php";
    }
}