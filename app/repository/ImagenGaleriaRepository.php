<?php
namespace cursophp7\app\repository;

use cursophp7\app\entity\Categoria;
use cursophp7\app\entity\ImagenGaleria;
use cursophp7\app\exceptions\NotFountException;
use cursophp7\app\exceptions\QueryException;
use cursophp7\core\database\QueryBuilder;

class ImagenGaleriaRepository extends QueryBuilder
{

    /**
     * ImagenGaleriaRepository constructor.
     */
    public function __construct(string $table = 'imagenes', string $classEntity = ImagenGaleria::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param ImagenGaleria $imagenGaleria
     * @return Categoria
     * @throws NotFountException
     * @throws QueryException
     */
    public function getCategoria(ImagenGaleria $imagenGaleria): Categoria
    {
        $categoriaRepository = new CategoriaRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }

    /**
     * @param ImagenGaleria $imagenGaleria
     * @throws QueryException
     */
    public function guarda(ImagenGaleria $imagenGaleria)
    {
        $fnGuardaImagen = function () use ($imagenGaleria){
            $categoria = $this->getCategoria($imagenGaleria);
            $categoriaRepository = new CategoriaRepository();
            $categoriaRepository->nuevaImagen($categoria);
            $this->save($imagenGaleria);
        };
        $this->executeTransaction($fnGuardaImagen);
    }
}