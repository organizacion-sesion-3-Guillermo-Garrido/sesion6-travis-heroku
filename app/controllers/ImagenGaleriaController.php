<?php

namespace cursophp7\app\controllers;
use cursophp7\app\entity\ImagenGaleria;
use cursophp7\app\exceptions\AppException;
use cursophp7\app\exceptions\FileException;
use cursophp7\app\exceptions\QueryException;
use cursophp7\app\exceptions\ValidationException;
use cursophp7\app\repository\CategoriaRepository;
use cursophp7\app\repository\ImagenGaleriaRepository;
use cursophp7\app\utils\File;
use cursophp7\core\App;
use cursophp7\core\Response;

class ImagenGaleriaController
{
    /**
     * @throws QueryException
     */
    public function index(){
        $imagenes = App::getRepository(ImagenGaleriaRepository::class)->findAll();
        $categorias = App::getRepository(CategoriaRepository::class)->findAll();
        $descripcion = "";
        Response::renderView( 'galeria', 'layout', compact('imagenes', 'categorias', 'descripcion'));
    }

    /**
     * @throws ValidationException
     * @throws AppException
     * @throws FileException
     */
    public function save(){
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        if(empty($categoria)){
            throw new ValidationException('No se ha recibido la categoria');
        }
        $tipoAceptados = ['image/jpeg', 'image/png', 'image/gif'];
        $imagen = new File('imagen', $tipoAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORFOLIO);
        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
        App::getRepository(ImagenGaleriaRepository::class)->guarda($imagenGaleria);

        $menssage = "Se ha creado una nueva imagen " . $imagenGaleria->getNombre();
        App::get('logger')->add($menssage);
        App::get('router')->redirect('imagenes-galeria');
    }
}