<?php
namespace cursophp7\app\entity;

use cursophp7\core\database\IEntity;

class Categoria implements IEntity
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var int
     */
    private $numImagenes;

    /**
     * Categoria constructor.
     * @param string $nombre
     * @param int $numImagenes
     */
    public function __construct(string $nombre = "", int $numImagenes = 0)
    {
        $this->id = null;
        $this->numImagenes =  $numImagenes;
        $this->nombre = $nombre;
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
     * @return Categoria
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
     * @return Categoria
     */
    public function setNombre(string $nombre): Categoria
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumImagenes(): int
    {
        return $this->numImagenes;
    }

    /**
     * @param int $numDownloads
     * @return Categoria
     */
    public function setNumImagenes(int $numImagenes): Categoria
    {
        $this->numImagenes = $numImagenes;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'numImagenes' => $this->getNumImagenes()
        ];
    }
}