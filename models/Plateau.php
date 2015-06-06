<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plateau
 *
 * @author Sinapxys01
 */
class Plateau {

    public $coordenadas;
    private $orientacion = array('N', 'E', 'S', 'O');
    public $rovers = array();

    public function __construct() {
        
    }

    private function iniciarNavegacion($instrucciones) {
        $this->coordenadas = $instrucciones[0];

        for ($i = 1; $i < count($instrucciones); $i = $i + 2) {
            $this->rovers[] = new Rover($instrucciones[$i], $instrucciones[$i + 1]);
        }

        foreach ($this->rovers as $rover) {
            $rover->navegar($this->orientacion, $this->coordenadas);
        }
    }

    /**
     * Inicia de la lectura del archivo y la navegacion de los rovers
     */
    public function main() {

        // leemos el archivo de entrada
        require 'components/Interpreter.php';
        $interpreter = new Interpreter();

        if ($interpreter->cargarArchivo() == true) {
            // recuperamos el contenido del archivo
            $instrucciones = $interpreter->cargarIntrucciones();

            // damos inicio a cada uno de los rovers
            $this->iniciarNavegacion($instrucciones);
        }
    }

}
