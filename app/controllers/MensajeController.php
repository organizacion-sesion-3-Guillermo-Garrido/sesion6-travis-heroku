<?php

namespace cursophp7\app\controllers;
use Cassandra\Exception\ValidationException;
use cursophp7\app\entity\Mensaje;
use cursophp7\app\exceptions\AppException;
use cursophp7\app\exceptions\QueryException;
use cursophp7\app\repository\MensajeRepository;
use cursophp7\core\App;
use cursophp7\core\Response;

class MensajeController
{
    /**
     * @throws QueryException
     */
    public function index(){
        Response::renderView( 'contact', 'layout');
    }

    /**
     * @throws AppException
     */
    public function save(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim(htmlspecialchars($_POST['nombre']));
            $apellidos = trim(htmlspecialchars($_POST['apellidos']));
            $email = trim(htmlspecialchars($_POST['email']));
            $asunto = trim(htmlspecialchars($_POST['asunto']));
            $texto = trim(htmlspecialchars($_POST['texto']));
            if (empty($nombre)) {
                throw new ValidationException("El nombre es necesario");
            }
            if (empty($email)) {
                throw new ValidationException("El email es necesario");
            } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    throw new ValidationException("El email no es valido");
                }
            }
            if (empty($asunto)) {
                throw new ValidationException("El asunto es necesario");
            }
            $mensaje = new Mensaje($nombre, $apellidos, $email, $asunto, $texto);
            App::getRepository(MensajeRepository::class)->guarda($mensaje);
        }
        $menssage = "Se ha creado un nuevo mensaje " . $mensaje->getAsunto();
        App::get('logger')->add($menssage);
        App::get('mailer')->send($asunto, $email, $nombre, $texto);
        Response::renderView( 'contact', 'layout', compact('nombre', 'apellidos', 'email', 'asunto', 'texto'));
    }
}