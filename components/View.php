<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Sinapxys01
 */
class View {

    function __construct() {
        
    }

    /**
     * Renderizara la vista
     * @param type $name es el nombre de nuestra plantilla, por ej, listado.php
     * @param type $vars es el contenedor de nuestras variables, es un arreglo del tipo llave => valor, opcional.
     */
    public function show($name, $vars = array()) {
        $config = Config::singleton();

        // armado de la ruta
        $path = $config->get('views') . $name;

        if (file_exists($path) == false) {
            trigger_error('Plantilla ' . $path . ' no existe. ', E_USER_NOTICE);
            return false;
        }
        
        if(is_array($vars)){
            foreach ($vars as $key => $value) {
                $key = $value;
            }
        }
        
        // incluimos la plantilla
        include $path;
    }

}
