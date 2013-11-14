<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicioController
 *
 * @author webmaster
 */
class inicioController extends Display{
    function deploy(){
        $this->deployMainMenu();
        //$this->deploySideMenu();
        $this->vista = "inicio";
        
        if(!empty ($_GET['action'])){            
            $action = $_GET['action'];
            if(method_exists($this,$action)){
                $this->$action();
            }
        }
        
        
        require_once P_THEME.DS."index.php";
    }
    
   
}

?>
