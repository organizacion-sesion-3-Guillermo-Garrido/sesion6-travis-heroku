<?php
namespace cursophp7\core;

use cursophp7\app\exceptions\AppException;
use cursophp7\core\database\Connection;
use cursophp7\core\database\QueryBuilder;

class App
{
    /**
     * @var array
     */
    private static $container = [];

    /**
     * @param string $key
     * @param $value
     */
    public static function bind(string $key, $value){
        static::$container[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws AppException
     */
    public static function get(string $key){
        if(!array_key_exists($key, static::$container)){
            throw new AppException("No se ha encontrado la clase $key en el contenedor");
        }
        return static::$container[$key];
    }

    /**
     * @return mixed
     * @throws AppException
     */
    public static function getConnection(){
        if(!array_key_exists('connection', static::$container)) {
            static::$container['connection'] = Connection::make();
        }
        return static::$container['connection'];
    }

    /**
     * @param string $className
     * @return QueryBuilder
     */
    public static function getRepository(string $className):QueryBuilder{
        if(!array_key_exists($className, static::$container)) {
            static::$container[$className] = new $className;
        }
        return static::$container[$className];
    }

}