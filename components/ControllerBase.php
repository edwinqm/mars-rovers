<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerBase
 *
 * @author Sinapxys01
 */
abstract class ControllerBase {
    
    protected  $view;
    
    function __construct() {
        $this->view = new View();
    }
    
}
