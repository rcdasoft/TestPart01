<?php

/*
 * ClearPar Class
 * PHP Version 5
 * @link URL description
 * @author R.Delgado
 * @version 1.0
 */

/**
 * Recibe como parámetro una cadena formada sólo por paréntesis
 * (()()()()(()))))())((()​). 
 * Eliminar todos los paréntesis que no tienen pareja.
 * 
 *
 * @author r.Delgado
 */
class ClearPar {

    /**
     * Elimina los parentesis que no tienen pareja
     * 
     * @param strin $cadena a evaluar
     * @return string $cadenaNueva
     */
    public function build($cadena) {
        $cadenaNueva = '';
        $cadenaBusqueda = '()';
        $patron = '/^(\(|\))+$/';
        try {
            if (is_string($cadena)) {

                if (preg_match($patron, $cadena)) {
                    $numCoincidencias = substr_count($cadena, $cadenaBusqueda);
                    $cadenaNueva = str_pad($cadenaNueva, $numCoincidencias * 2, $cadenaBusqueda);
                } else {
                    $cadenaNueva = 'Solo se permiten los parentesis como caracteres validos';
                }
            } else {
                $cadenaNueva = 'El Valor ingresado no es una cadena';
            }
        } catch (Exception $exc) {
            $cadenaNueva = $exc;
        }
        return $cadenaNueva;
    }

}
