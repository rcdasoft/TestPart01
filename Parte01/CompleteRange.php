<?php

/*
 * CompleteRange Class
 * PHP Version 5
 * @link URL description
 * @author R.Delgado
 * @version 1.0
 */

/**
 * Toma una colección de números enteros positivos (1,2,3, ...n) 
 * completa si faltan números en la colección en el rango dado 
 * luego entrega un array con la coleccion completa
 * 
 * El durante el proceso el algoritmo no eliminar los valores duplicados 
 * que pudieran existir en la coleeccion
 *
 * @author R.Delgado
 */
class CompleteRange {

    //put your code here
    public function build($serie) {
        $serieCompleta = array();
        $procesar = TRUE;
        $mensaje = '';
        $patron = '/^([0-9])+$/'; /* Patron de numeros enteros positivos */

        /* Validacion de la Serie Ingresada */
        if (!is_array($serie)) {
            $procesar = FALSE;
            $mensaje = 'No es una serie';
        }

        if (count($serie) == 0) {
            $procesar = FALSE;
            $mensaje = 'Serie no contiene datos';
        }

        /* Validar si los valores de la serie son Enteros Positivos  */
        if ($procesar) {

            foreach ($serie as $value) {
                if (is_string($value)) {
                    $procesar = FALSE;
                    $mensaje = 'Solo se permiten valores enteros positivos';
                    break;
                }

                if ($value > PHP_INT_MAX) {
                    $procesar = FALSE;
                    $mensaje = 'Existe un valor fuera del rango de enteros positivos';
                    break;
                }

                if (!preg_match($patron, $value)) {
                    $procesar = FALSE;
                    $mensaje = 'Existe un valor que No es un entero positivo Valido';
                    break;
                }
            }
        }

        // Completar Serie
        if ($procesar) {
            try {
                sort($serie);
                $rangoInicio = $serie[0];
                $rangoFin = end($serie);
                for ($index = $rangoInicio; $index < $rangoFin; $index++) {
                    if (!in_array($index, $serie)) {
                        array_push($serie, $index);
                    }
                }
                sort($serie);
            } catch (Exception $exc) {
                $procesar = FALSE;
                $mensaje = $exc->getTraceAsString();
            }
        }

        // Imprimir Resultado
        if ($procesar) {
            $return = $serie;
        } else {
            $return = array('error' => $mensaje);
        }
        return $return;
    }

}
