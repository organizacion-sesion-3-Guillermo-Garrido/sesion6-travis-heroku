<?php
namespace cursophp7\app\utils;
class Utils{
    public static function esOpcionMenuActiva(string $opcionMenu): bool
    {
        if (strpos($_SERVER['REQUEST_URI'], $opcionMenu) !== false)
            return true;

        return false;
    }

    public static function existeOpcionMenuActivaEnArray(array $opcionesMenu): bool
    {
        foreach ($opcionesMenu as $opcionMenu) {
            if (self::esOpcionMenuActiva($opcionMenu) === true)
                return true;
        }

        return false;
    }

    public static function elementosAleaotorios($elementos, $numero)
    {
        shuffle($elementos);
        return array_chunk($elementos, $numero)[0];
    }
}
