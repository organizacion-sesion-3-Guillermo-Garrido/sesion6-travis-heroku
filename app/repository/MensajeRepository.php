<?php
namespace cursophp7\app\repository;

use cursophp7\app\entity\Mensaje;
use cursophp7\app\exceptions\QueryException;
use cursophp7\core\database\QueryBuilder;

class MensajeRepository extends QueryBuilder
{

    /**
     * MensajeRepository constructor.
     */
    public function __construct(string $table = 'mensajes', string $classEntity = Mensaje::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param Mensaje $mensaje
     * @throws QueryException
     */
    public function guarda(Mensaje $mensaje)
    {
        $fnGuardaImagen = function () use ($mensaje){
            $this->save($mensaje);
        };
        $this->executeTransaction($fnGuardaImagen);
    }
}