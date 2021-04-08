<?php
namespace cursophp7\core;

use cursophp7\app\exceptions\NotFountException;
use \cursophp7\app\exceptions\AppException;

class Router
{
    private $routes;

    /**
     * Router constructor.
     */
    private function __construct()
    {
        $this->routes = [
            'GET'=>[],
            'POST' => []
        ];
    }

    /**
     * @param string $file
     * @return Router
     */
    public static function load(string $file): Router{
        $router = new Router();
        require $file;
        return $router;
    }

    /**
     * @param string $uri
     * @param $controller
     */
    public function get(string $uri, $controller): void{
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @param string $uri
     * @param $controller
     */
    public function post(string $uri, $controller): void{
        $this->routes['POST'][$uri] = $controller;
    }


    /**
     * @param string $uri
     * @param string $method
     * @return void
     * @throws NotFountException
     * @throws AppException
     */
    public function direct(string $uri, string $method): void{

        if(!array_key_exists($uri, $this->routes[$method])) {
            throw new NotFountException('No se ha definido la ruta para la uri solicitada');
        }
        list($controller, $action) = explode('@', $this->routes[$method][$uri]);
        $this->callAction($controller, $action);
    }

    /**
     * @param string $path
     */
    public function redirect(string $path): void{
        header('location: /' . $path);
    }

    /**
     * @param string $controller
     * @param string $action
     * @throws NotFountException
     * @throws AppException
     */
    private function callAction(string $controller, string $action): void{
        $controller = App::get('config')['project']['name'] . '\\app\\controllers\\' . $controller;
        $objectController = new $controller();
        if(! method_exists($objectController, $action)){
            throw new NotFountException("No se encuentra el metodo $action en el controlador $controller");
        }
        $objectController->$action();
    }
}