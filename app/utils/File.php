<?php
namespace cursophp7\app\utils;

use cursophp7\app\exceptions\FileException;

class File
{
    private $file;
    private string $filename;

    /**
     * File constructor.
     * @param string $filename
     * @param array $arrayTypes
     * @throws FileException
     */
    public function __construct(string $filename, array $arrayTypes)
    {
        $this->file = $_FILES[$filename];
        $this->filename = '';
        if (!isset($this->file)) {
            throw new FileException('Debes selecionar un fichero');
        }
        if ($this->file['error']) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new FileException('El fichero es demasiado grande');
                case UPLOAD_ERR_PARTIAL:
                    throw new FileException('No se ha podido subir el fichero completo');
                default:
                    throw new FileException('No se ha podido subir el fichero');
            }
        }
        if (in_array($this->file['type'], $arrayTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    public function getFileName()
    {
        return $this->filename;
    }

    /**
     * @param $rutaDestino
     * @throws FileException
     */
    public function saveUploadFile($rutaDestino)
    {
        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException('El archivo no ha sido subido mendiante un formulario');
        }
        $this->filename = $this->file['name'];
        $ruta = $rutaDestino . $this->filename;
        if (is_file($ruta) === true) {
            $idUnico = time();
            $this->filename = $idUnico . '_' . $this->filename;
            $ruta = $rutaDestino . $this->filename;
        }
        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            throw new FileException('No se ha podido mover el fichero a su destino');
        }
    }

    /**
     * @param $rutaOrigen
     * @param $rutaDestino
     * @throws FileException
     */
    public function copyFile($rutaOrigen, $rutaDestino)
    {
        $origen = $rutaOrigen . $this->filename;
        $destino = $rutaDestino . $this->filename;
        if (is_file($origen) === false) {
            throw new FileException("No existe el fichero $origen que estas intentando copiar");
        }
        if (is_file($destino) === true) {
            throw new FileException("Ya existe el fichero $destino y no se puede sobreescribir");
        }
        if (copy($origen, $destino) === false) {
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
    }
}