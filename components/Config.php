<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Clase Config basado en el patron de disenio singleton
 *
 * @author Sinapxys01
 */
class Config {
    
    private $vars;
    private static $instance;
    
    private function __construct() {
        $this->vars = array();
    }
    
    /**
     * Guardamos las variables
     * @param type $name
     * @param type $value
     */
    public function set($name, $value) {
        if(!isset($this->vars[$name]))
            $this->vars[$name] = $value;
    }
    
    /**
     * Retorna el valor unico no repetido
     * @param type $name
     * @return type
     */
    public function get($name) {
        if(isset($this->vars[$name]))
            return $this->vars[$name];
    }
    
    /**
     * Metodo estatico que instancia la clase unica
     * @return type
     */
    public static function singleton() {
        if(!isset(self::$instance)){
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }
    
}
