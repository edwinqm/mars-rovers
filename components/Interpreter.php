<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Interpreter
 *
 * @author Sinapxys01
 */
class Interpreter {

    private $file;
    private $fp;

    public function __construct() {
        $this->file = "comandos.txt";
    }

    public function cargarArchivo() {

        if (is_file($this->file)) {
            $this->fp = fopen($this->file, 'r') or exit("No se pudo cargar el archivo");
            return true;
        } else
            return false;
    }

    public function cargarIntrucciones() {

        $instruccines = array();
        while (!feof($this->fp)){
            $instruccines[] = trim(fgets($this->fp));
        }
        fclose($this->fp);
        
        return $instruccines;
    }

}
