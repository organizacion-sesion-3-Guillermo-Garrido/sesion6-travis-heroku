<?php
namespace cursophp7\app\entity;

use cursophp7\core\database\IEntity;

class Asociado implements IEntity
{
    const RUTA_IMAGENES_LOGO = 'images/index/asociados/';
    private string $nombre, $logo, $descripcion;
    private $id;

    /**
     * Asociado constructor.
     * @param string $nombre
     * @param string $logo
     * @param string $descripcion
     */
    public function __construct(string $nombre = "", string $logo="", string $descripcion="")
    {
        $id = null;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Asociado
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Asociado
     */
    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Asociado
     */
    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Asociado
     */
    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getUrlLogo(): string
    {
        return self::RUTA_IMAGENES_LOGO . $this->getLogo();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'logo' => $this->getLogo()
        ];
    }
}