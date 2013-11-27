<?php

class Display {

    var $acl;
    var $vista;
    var $contentView = "default";
    var $controller;
    var $transaction = null;
    var $mainMenu;
    var $sideMenu;
    var $error = false;
    var $alert = false;
    var $done = false;
    var $info = false;
    var $errorMsg = Null;
    var $doneMsg = Null;
    var $alertMsg = Null;
    var $infoMsg = Null;
    var $masterCtrl;
    var $params;
    
    public function __construct() {
        $this->masterCtrl = new MasterController();
        $this->masterCtrl->requerirControlador("ControlSesiones");
        $this->masterCtrl->requerirClase("ClassTransaction");
        
        $this->acl = new ControlSesiones();
        $this->transaction = new ClassTransaction();
    }

    function setController($ctrl) {
        
    }

    function deployContent(){
        if(!$this->acl->sessionActive()){
            if(isset($_GET['v']) && $_GET['v']){
                $this->vista = $_GET['v'];
            }else{
                $this->vista = "inicio";
            }
            
        }elseif($_GET['v']){
            $this->vista = $_GET['v'];
        }else{
            $this->vista = "inicio";
        }
        
        MasterController::requerirControladorDeVista($this->vista);
        $ctrl = $this->vista."Controller";
        
        $controller = new $ctrl();
        $controller->deploy();
    }

    function renderContent() {
        
    }

    function loadContentView($v) {
        $this->contentView = $v;
    }

    function systemRedirect($location) {
        header("Location: {$location}");
    }

    function getContentView() {
        $cvPath = P_VISTAS . DS . $this->vista . DS . "html" . DS . $this->contentView . ".php";
        //echo  $cvPath ."<br />";  
        if (file_exists($cvPath)) {
            require_once ($cvPath);
        } else {
            echo "no se encuentra ese contenido";
        }
    }

    function deployMainMenu (){
        if($this->acl->sessionActive()){
            
            if($this->acl->acl("Administrar Parametros")){
                $this->mainMenu .= '<li ><a href="?v=estandares">Estandares</a></li>';
                $this->mainMenu .= '<li ><a href="?v=hospital">Servicios</a></li>';
            }
            
            if($this->acl->acl("Submision")){
                $this->mainMenu .= '<li ><a href="?v=submision">Registro de datos</a></li>';
            }
            
            if($this->acl->acl("Administrar Usuarios")){
                $this->mainMenu .= '<li ><a href="?v=usuario">usuarios</a></li>';
            }
            
            //$this->mainMenu .= '<li ><a href="?v=reportes">ver reportes</a></li>';
            $this->mainMenu .= '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?v=reportes&action=especifico">Indicador especifico</a></li>
                  <li><a href="?v=reportes&action=todos">Todos los indicadores</a></li>
                  
                </ul>
              </li>';
            
        }else{
            //$this->mainMenu .= '<li ><a href="?v=reportes">ver reportes</a></li>';
            
            $this->mainMenu .= '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?v=reportes&action=especifico">Indicador especifico</a></li>
                  <li><a href="?v=reportes&action=todos">Todos los indicadores</a></li>
                  
                </ul>
              </li>';
            $this->mainMenu .= '<li ><a href="?v=login">ingreso</a></li>';
        }
        
    }

    function deploy() {
        $this->deployMainMenu();
        require_once P_THEME . DS . "index.php";
    }

    function activesMsgs() {
        $msg = "";
        if ($this->error) {
            $msg .= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>' . $this->errorMsg . '</div>';
        }

        if ($this->alert) {
            $msg .= '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">×</button>' . $this->alertMsg . '</div>';
        }


        if ($this->done) {
            $msg .= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>' . $this->doneMsg . '</div>';
        }

        if ($this->info) {
            $msg .= '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>' . $this->infoMsg . '</div>';
        }
        if ($msg) {
            return $msg;
        } else {
            return FALSE;
        }
    }

    function returnThisUrl($extras = false) {
        $url = "?";
        $v = trim($_GET['v']);
        $act = trim($_GET['action']);
        if ($v) {
            $url .= "v=" . $v;
            if ($act || $extras) {
                $url .= "&";
            }
        }

        if ($act) {
            $url .= "action=" . $act;
            if ($extras) {
                $url .= "&";
            }
        }

        if ($extras) {
            $url .= $extras;
        }

        return $url;
    }

    function returnOptionsByFilterParent() {
        if ($_GET['referencia']) {
            MasterController::requerirClase("MysqlSelect");
            $sl = new MysqlSelect();
            $sl->setTableReference($_GET['referencia']);
            $sl->addSelection($_GET['referencia'], $_GET['referenciaVal']);
            $sl->addSelection($_GET['referencia'], $_GET['referenciaLabel']);
            $sl->addFilter($_GET['referenciaParent'], $_GET['referenciaParent'] . "_id", $_GET['itemId'], "=");
            if ($sl->execute()) {
                if (count($sl->rows)) {
                    foreach ($sl->rows AS $r) {
                        echo '<option value="' . $r[$_GET['referenciaVal']] . '">' . $r[$_GET['referenciaLabel']] . '</option>';
                    }
                }
            }
        }
        die;
    }

    function baseUrl() {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . BASE_URL;
    }

    function templateUrl() {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . BASE_URL . "/" . THEME_DIRNAME;
    }

    function createLink($view = null, $action = null, $params = null) {
        $link = $this->baseUrl() . "?";
        $viewAfterSign = "";
        $actionAfterSign = "";

        if ($view != NULL) {
            $link .= "v=" . $view;
            $viewAfterSign = "&";
            $actionAfterSign = "&";
        }

        if ($action != NULL) {
            $link .= $viewAfterSign . "action=" . $action;
            $actionAfterSign = "&";
        }

        if (  $params != NULL) {
            $link .= $actionAfterSign . $params;             
        }



        return $link;
    }

    function enconde($val) {
        $characters = '0123456789}][{~·@|abcdefghijklmnopqrstuvwxyz?=)(%$#!ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $initRand = '';
        for ($i = 0; $i < 20; $i++) {
            $initRand .= $characters[rand(0, strlen($characters) - 1)];
        }
        $endRand = '';
        for ($i = 0; $i < 20; $i++) {
            $endRand .= $characters[rand(0, strlen($characters) - 1)];
        }
        $crypt = $initRand . str_replace("=", "#%1", base64_encode($val)) . $endRand;
        return $crypt;
    }

    function decode($val) {
        return base64_decode(str_replace("#%1", "=", substr(substr($val, 20), 0, -20)));
    }

    function hashPass($string) {
        return base64_encode(hash("sha256", base_convert($string, 10, 32)));
    }
    
    function monthName($monthNumber) {
        $months = array(
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"
        );
        return $months[$monthNumber];
    }
    
    function passParam($param,&$var){
        $this->params[$param] = $var;
    }

}