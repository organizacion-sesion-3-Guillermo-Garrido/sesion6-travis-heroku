<?php
namespace cursophp7\app\entity;

use cursophp7\core\database\IEntity;

class ImagenGaleria implements IEntity
{
    const RUTA_IMAGENES_PORFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @var int
     */
    private $numVisualizaciones;
    /**
     * @var int
     */
    private $numLikes;
    /**
     * @var int
     */
    private $categoria;
    /**
     * @var int
     */
    private $numDownloads;

    /**
     * ImagenGaleria constructor.
     * @param string $nombre
     * @param string $descripcion
     * @param int categoria
     * @param int $numVisualizaciones
     * @param int $numLikes
     * @param int $numDownloads
     */
    public function __construct(string $nombre="", string $descripcion="", int $categoria = 1, int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0)
    {
        $this->id = null;
        $this->categoria = $categoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ImagenGaleria
     */
    public function setId(?int $id): ImagenGaleria
    {
        $this->id = $id;
        return $this;
    }

    public function __toString(): string
    {
        return $this->getDescripcion();
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
     * @return ImagenGaleria
     */
    public function setNombre(string $nombre): ImagenGaleria
    {
        $this->nombre = $nombre;
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
     * @return ImagenGaleria
     */
    public function setDescripcion(string $descripcion): ImagenGaleria
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumVisualizaciones(): int
    {
        return $this->numVisualizaciones;
    }

    /**
     * @param int $numVisualizaciones
     * @return ImagenGaleria
     */
    public function setNumVisualizaciones(int $numVisualizaciones): ImagenGaleria
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumLikes(): int
    {
        return $this->numLikes;
    }

    /**
     * @param int $numLikes
     * @return ImagenGaleria
     */
    public function setNumLikes(int $numLikes): ImagenGaleria
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    /**
     * @param int $numDownloads
     * @return ImagenGaleria
     */
    public function setNumDownloads(int $numDownloads): ImagenGaleria
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORFOLIO . $this->getNombre();
    }

    public function getUrlGallery(): string
    {
        return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }
    /**
     * @return int
     */
    public function getCategoria(): int
    {
        return $this->categoria;
    }

    /**
     * @param int $category
     * @return ImagenGaleria
     */
    public function setCategory(int $categoria): ImagenGaleria
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'categoria' => $this->getCategoria(),
            'descripcion' => $this->getDescripcion(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads()
        ];
    }
}

?>