<?php
namespace cursophp7\app\entity;

use cursophp7\core\database\IEntity;

class Mensaje implements IEntity
{
    /**
     * @var null
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $apellidos;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $asunto;
    /**
     * @var string
     */
    private $texto;

    /**
     * Mensaje constructor.
     * @param string $nombre
     * @param string $apellidos
     * @param string $email
     * @param string $asunto
     * @param string $texto
     */
    public function __construct(string $nombre, string $apellidos, string $email, string $asunto, string $texto)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->asunto = $asunto;
        $this->texto = $texto;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     * @return Mensaje
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     * @return Mensaje
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     * @return Mensaje
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Mensaje
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * @param mixed $asunto
     * @return Mensaje
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     * @return Mensaje
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'apellidos' => $this->getApellidos(),
            'email' => $this->getEmail(),
            'asunto' => $this->getAsunto(),
            'texto' => $this->getTexto()
        ];
    }
}