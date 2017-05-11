<?php

/**
 * ChangeString Class
 * PHP Version 5
 * @link URL description
 * @author R.Delgado
 * @version 1.0
 */

/**
 * Reemplaza cada letra de la cadena con la letra siguiente en el alfabeto. 
 * Por ejemplo reemplazar a​ por b​ ó c​ por d.​ 
 * @author R.Delgado
 */
class ChangeString {

    private $original = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    private $reemplazo = "bcdefghijklmnñopqrstuvwxyzaBCDEFGHIJKLMNÑOPQRSTUVWXYZA";

    /**
     * Realiza el reemplazo de los caracteres 
     * 
     * @param string $cadena cadena a evaluar
     * @return string Cadena con caraceres reemplazados
     */
    public function build($cadena) {
        try {
            if (is_string($cadena)) {
                $cadenaNueva = strtr($cadena, $this->original, $this->reemplazo);
            } else {
                $cadenaNueva = 'El Valor ingresado no es una cadena';
            }
        } catch (Exception $exc) {
            $cadenaNueva = $exc;
        }
        return $cadenaNueva;
    }

}
