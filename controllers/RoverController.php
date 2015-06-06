<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'models/Rover.php';
require 'models/Plateau.php';

/**
 * Description of RoverController
 *
 * @author Sinapxys01
 */
class RoverController extends ControllerBase {

    /**
     * Action index
     */
    public function index() {
                
        $plateau = new Plateau();
        $plateau->main();
        
        $rovers = $plateau->rovers;
        $vars['rovers'] = $rovers;
        
        $this->view->show('rover/index.php', $vars);
    }
    
}
