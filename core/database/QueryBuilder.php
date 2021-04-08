<?php
namespace cursophp7\core\database;

use cursophp7\app\exceptions\AppException;
use cursophp7\app\exceptions\NotFountException;
use cursophp7\app\exceptions\QueryException;
use cursophp7\core\App;
use PDO;
use PDOException;

abstract class QueryBuilder
{
    private $connection;
    private $table;
    private $classEntity;

    /**
     * QueryBuilder constructor.
     * @param string $table
     * @param string $classEntity
     * @throws AppException
     */
    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;

    }

    /**
     * @param string $table
     * @param string $classEntity
     * @throws QueryException
     */
    public function findAll()
    {
        $sql = "SELECT * from " . $this->table;
        return $this->executeQuery($sql);
    }

    /**
     * @param string $sql
     * @return mixed
     * @throws QueryException
     */
    private function executeQuery(string $sql){
        $pdoStatement = $this->connection->prepare($sql);
        if ($pdoStatement->execute() === false) {
            throw new QueryException("No se ha podido ejecutar la query solicitada");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    /**
     * @param int $id
     * @return IEntity
     * @throws NotFountException
     * @throws QueryException
     */
    public function find(int $id): IEntity
    {
        $sql = "SELECT * from $this->table WHERE id = $id";
        $result = $this->executeQuery($sql);
        if(empty($result))
            throw new NotFountException("No se ha encontrado ningún elemento con id $id");
        return $result[0];
    }

    /**
     * @param IEntity $entity
     * @throws QueryException
     */
    public function save(IEntity $entity) : void{
        try {
            $parameters = $entity->toArray();
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
            );
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        }catch (PDOException $exception){
            throw new QueryException('Error al insertar en la base de datos');
        }
    }

    public function executeTransaction(callable $fnExecuteQuerys){
        try{
            $this->connection->beginTransaction();
            $fnExecuteQuerys();
            $this->connection->commit();
        }catch (PDOException $pdoException){
            $this->connection->rollBack();
            throw new QueryException('No se ha podido realizar la operacion');
        }
    }
    private function getUpdates(array $parameters){
        $updates = '';
        foreach ($parameters as $key => $value){
            if($key !== 'id'){
                if($updates !== ''){
                    $updates .= ', ';
                }
                $updates .= $key . '=:' . $key;
            }
        }
        return $updates;
    }

    public function update(IEntity $entity): void{
        try {
            $parameters = $entity->toArray();
            $sql = sprintf(
                'UPDATE %s SET %s WHERE id=:id',
                $this->table,
                $this->getUpdates($parameters)
            );
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        }catch (PDOException $pdoException){
            throw new QueryException('No se ha podido actualizar el eleimento id ' . $parameters['id']);
        }
    }
}