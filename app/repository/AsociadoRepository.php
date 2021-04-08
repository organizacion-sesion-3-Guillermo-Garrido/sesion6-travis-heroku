<?php
namespace cursophp7\app\repository;

use cursophp7\app\entity\Asociado;
use cursophp7\app\exceptions\QueryException;
use cursophp7\core\database\QueryBuilder;

class AsociadoRepository extends QueryBuilder
{

    /**
     * AsociadoRepository constructor.
     */
    public function __construct(string $table = 'asociados', string $classEntity = Asociado::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param Asociado $asociado
     * @throws QueryException
     */
    public function guarda(Asociado $asociado)
    {
        $fnGuardaImagen = function () use ($asociado){
            $this->save($asociado);
        };
        $this->executeTransaction($fnGuardaImagen);
    }
}