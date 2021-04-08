<?php

namespace cursophp7\app\controllers;
use cursophp7\app\entity\Asociado;
use cursophp7\app\exceptions\AppException;
use cursophp7\app\exceptions\FileException;
use cursophp7\app\exceptions\ValidationException;
use cursophp7\app\repository\AsociadoRepository;
use cursophp7\app\utils\File;
use cursophp7\core\App;
use cursophp7\core\Response;

class AsociadoController
{
    /**
     *
     */
    public function index(){
        $asociados = App::getRepository(AsociadoRepository::class)->findAll();
        $descripcion = "";
        Response::renderView( 'asociados', 'layout', compact('asociados', 'descripcion'));
    }

    /**
     * @throws ValidationException
     * @throws AppException
     * @throws FileException
     */
    public function save(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $nombre = trim(htmlspecialchars($_POST['nombre']));
            if(empty($nombre)){
                throw new ValidationException('No se ha recibido el nombre');
            }
            $tipoAceptados = ['image/jpeg', 'image/png', 'image/gif'];
            $imagen = new File('imagen', $tipoAceptados);
            $imagen->saveUploadFile(Asociado::RUTA_IMAGENES_LOGO);
            $asociado = new Asociado($nombre, $imagen->getFileName(), $descripcion);
            App::getRepository(AsociadoRepository::class)->guarda($asociado);
        }
        $menssage = "Se ha creado un nuevo asociado " . $asociado->getNombre();
        App::get('logger')->add($menssage);
        App::get('router')->redirect('asociados');
    }
}