<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rover
 *
 * @author Sinapxys01
 */
class Rover {

    public $posision_inicial;
    public $instruccion;
    public $posicion_final;

    public function __construct($posicion, $instruccion) {
        $this->posicion_final = $this->posision_inicial = $posicion;
        $this->instruccion = $instruccion;
    }

    /**
     * Metodo que permite orientar y avanzar al rover
     * @param type $orientacion
     * @param type $liminte_coordenadas
     */
    public function navegar($orientacion = array(), $coordenadas) {

        $array_pos_aux = explode(' ', $this->posicion_final);

        $long = strlen($this->instruccion);
        $cad = $this->instruccion;

        for ($i = 0; $i < $long; $i++) {
            switch ($cad[$i]) {
                case 'L':
                    $this->izquierda($array_pos_aux[2], $orientacion);
                    $this->posicion_final = implode(' ', $array_pos_aux);
                    break;
                case 'R':
                    $this->derecha($array_pos_aux[2], $orientacion);
                    $this->posicion_final = implode(' ', $array_pos_aux);
                    break;
                case 'M':
                    $this->avanzar($array_pos_aux[0], $array_pos_aux[1], $array_pos_aux[2], $coordenadas);
                    $this->posicion_final = implode(' ', $array_pos_aux);
                    break;
            }
        }
    }

    private function izquierda(&$orientacion_actual, $orientacion = array()) {
        $long = count($orientacion);
        $pos = array_search($orientacion_actual, $orientacion);
        $pos_nueva = ($long - 1) - (($long - $pos) % $long);
        $orientacion_actual = $orientacion[$pos_nueva];
    }

    private function derecha(&$orientacion_actual, $orientacion = array()) {
        $long = count($orientacion);
        $pos = array_search($orientacion_actual, $orientacion);
        $pos_nueva = ($pos + 1) % $long;
        $orientacion_actual = $orientacion[$pos_nueva];
    }

    private function avanzar(&$x, &$y, $orientacion, $liminte_coordenadas) {

        $array_aux = explode(' ', $liminte_coordenadas);

        switch ($orientacion) {
            case 'N':
                if ($y < $array_aux[1])
                    $y++;
                break;
            case 'E':
                if ($x < $array_aux[0])
                    $x++;
                break;
            case 'S':
                if ($y >= 0)
                    $y--;
                break;
            case 'O':
                if ($x >= 0)
                    $x--;
                break;
        }
    }

}
