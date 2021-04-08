<?php
namespace cursophp7\app\controllers;
use cursophp7\app\repository\AsociadoRepository;
use cursophp7\app\repository\ImagenGaleriaRepository;
use cursophp7\app\utils\Utils;
use cursophp7\core\App;
use cursophp7\core\Response;

class PagesController
{
    /**
     * @throws \cursophp7\app\exceptions\QueryException
     */
    public function index(){
        $imagenes = App::getRepository(ImagenGaleriaRepository::class)->findAll();
        $asociados = App::getRepository(AsociadoRepository::class)->findAll();
        if(!empty($asociados)){
            $aso_aleatorios = Utils::elementosAleaotorios($asociados, 3);
        }
        Response::renderView( 'index', 'layout', compact('imagenes', 'aso_aleatorios'));
    }

    /**
     *
     */
    public function about(){
        Response::renderView( 'about', 'layout-with-footer');
    }

    /**
     *
     */
    public function blog(){
        Response::renderView( 'blog', 'layout-with-footer');
    }

    /**
     *
     */
    public function post(){
        Response::renderView( 'single_post', 'layout-with-footer');
    }
}