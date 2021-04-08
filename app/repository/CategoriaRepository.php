<?php
namespace cursophp7\app\repository;

use cursophp7\app\entity\Categoria;
use cursophp7\core\database\QueryBuilder;

class CategoriaRepository extends QueryBuilder
{

    /**
     * CategoriaRepository constructor.
     */
    public function __construct(string $table = 'categorias', string $classEntity = Categoria::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function nuevaImagen(Categoria $categoria){
        $categoria->setNumImagenes($categoria->getNumImagenes()+1);
        $this->update($categoria);
    }
}