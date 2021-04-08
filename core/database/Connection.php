<?php
namespace cursophp7\core\database;

use cursophp7\app\exceptions\AppException;
use cursophp7\core\App;
use PDO;
use PDOException;

class Connection
{
    /**
     * @return PDO
     * @throws AppException
     */
    public static function make()
    {
        try {
            $config = App::get('config')['database'];
            $connection = new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $PDOException) {
            throw new AppException('No se ha creado la conexión a la base de datos');
        }
        return $connection;
    }
}