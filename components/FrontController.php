<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontController
 *
 * @author Sinapxys01
 */
class FrontController {
    
    static function main() {
        
        require 'components/Config.php';
        require 'components/ControllerBase.php';
        
        require 'components/View.php';
        
        require('config/config.php');
        
        // formamos el nombre del controlador
        if(!empty($_GET['controller']))
            $controllerName = $_GET['controller'].'Controller';
        else
            $controllerName = 'RoverController';
        
        // formamos las acciones
        if(!empty($_GET['action']))
            $actionName = $_GET['action'];
        else
            $actionName = 'index';
        
        $controllerPath = $config->get('controllers').$controllerName.'.php';
        
        // incluimos el fichero que contiene la clase controladora
        if(is_file($controllerPath))
            require $controllerPath;
        else
            die ('Error 404 - El controller no existe.');
        
        // sin no existe la clase y su action, lanzamos un error 404
        if(is_callable(array($controllerName, $actionName)) == false){
            trigger_error($controllerName.'->'.$actionName.' no existe.', E_USER_NOTICE);
            return false;
        }
        
        // si todo esta bien, creamos la instancia del controlador y llamamos a la accion
        $controller = new $controllerName();
        $controller->$actionName();
    }
    
    
}
