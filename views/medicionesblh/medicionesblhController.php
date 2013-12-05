<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DepartamentoController
 *
 * @author webmaster
 */
class medicionesblhController extends Display {

    var $grid;
    var $rowsCount;

    function deploy() {
        $this->params = array();
        $this->deployMainMenu();
        $this->deploySideMenu();
        $this->vista = "medicionesblh";
        if (!empty($_GET['action'])) {
            $action = $_GET['action'];
            if (method_exists($this, $action)) {
                $this->$action();
            }
        } else {
            $this->masterCtrl->requerirModelo("hospital");
            $hsp = new hospital();
            if (isset($_GET['idh'])) {
                $hsp->setHospitalId($_GET['idh']);
                $hsp->getValuesBySetedId();
                $this->passParam("hospital", $hsp);
            } else {
                $this->alertMsg = "<h4>Alerta!</h4> No se han recibido el identificador del hospital";
            }
        }


        require_once P_THEME . DS . "index.php";
    }

    function deploySideMenu() {
        $this->sideMenu = "";
    }

    /*
      function createGrid($loadGrid=true){
      MasterController::requerirClase("MysqlSelect");
      $mselect =  new MysqlSelect();
      $mselect->setTableReference("indicador");
      $mselect->addCustomSelection("indicador.*");
      $mselect->addSelection("estandar", "nombre","estandar_nombre");
      $mselect->addJoin("estandar", "estandar_id", "=", "indicador", "estandar_id", "LEFT");
      //$mselect->addSelection($table, $select)
      //$mselect->addCustomSelection("municipio.*, departamento.nombre as departamento_nombre ");
      //$mselect->addJoin("departamento", "departamento_id", "=", "municipio", "departamento_id", "left");
      if($_GET['filtro']==1){
      if($_POST['estandarId']){
      $mselect->addFilter("estandar", "estandar_id", $_POST['estandarId'], "=");
      }elseif($_GET['estandarId']){
      $mselect->addFilter("estandar", "estandar_id", $_GET['estandarId'], "=");
      }
      }

      //$mselect->addFilter("departamento", "estado", "1", "=");
      if($_GET['pag']>0){
      $pag = ($_GET['pag'] * ITEMSPERPAGE);
      $mselect->addComplexLimit($pag, ITEMSPERPAGE);
      }else{
      $mselect->addSimpleLimit(ITEMSPERPAGE);
      }

      if($mselect->execute()){
      $this->grid = $mselect->rows;
      if($loadGrid){
      $this->loadContentView("grid");
      }
      }

      $this->rowsCount = $mselect->rowsCount();

      }


      function getPaginacionPosition(){
      return ceil($this->rowsCount/ITEMSPERPAGE);
      }

      function getArrayPaginacion(){
      $totalpags =$this->getPaginacionPosition();
      if($totalpags<7){
      $pags = Array();
      for($i=0;$i<$totalpags;$i++){
      $pags[]=$i;
      }
      return $pags;
      }else{
      if($_GET['pag']>3){
      $initpage=$_GET['pag']-3;
      for($i=$initpage;$i<=($initpage+1);$i++){
      $pags[]=$i;
      }
      }else{
      $pags = Array();
      for($i=0;$i<7;$i++){
      $pags[]=$i;
      }
      }
      return $pags;

      }

      }


      function viewAgregar(){
      $this->loadContentView("viewAgregar");
      }
     */

    function submitBasicInfoTEST() {
        echo ' 
                <div class="alert alert-success" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Éxito!</h4>
                  Medición guardada con exito!!
                </div>
            ';

        die;
    }

    function submitBasicInfo() {
        if (
                !isset($_POST['hospital_id'])
        ) {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Ooops!</h4>
                  Error guardando la medición de información básica <br />
                  El campo -- Hospital -- es obligatorio
                </div>
            ';
            die;
        }

        if (
                !isset($_POST['cantidad_cunas_servicio_recien_nacido']) ||
                !is_numeric($_POST['cantidad_cunas_servicio_recien_nacido'])
        ) {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Ooops!</h4>
                  Error guardando la medición de información básica <br />
                  El campo -- Cunas en servicio de recien nacido -- debe ser un numero entero
                </div>
            ';
            die;
        }

        if (
                !isset($_POST['cantidad_camas_maternidad']) ||
                !is_numeric($_POST['cantidad_camas_maternidad'])
        ) {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Ooops!</h4>
                  Error guardando la medición de información básica <br />
                  El campo -- Camas de maternidad -- debe ser un numero entero
                </div>
            ';
            die;
        }

        if (
                empty($_POST['nombre_coordinadora'])
        ) {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Ooops!</h4>
                  Error guardando la medición de información básica <br />
                  El campo -- Nombre de la coordinadora -- es obligatorio
                </div>
            ';
            die;
        }
        //echo "<pre>"; print_r($_POST); echo "</pre>"; die;
        if ($_POST['isnew'] == "isnew") {
            $this->saveBasicInfo();
        } else {
            $this->updateBasicInfo();
        }
    }

    function saveBasicInfo() {

        //echo "<pre>"; print_r($_POST); echo "</pre>"; die;

        $this->masterCtrl->requerirModelo("medicion_blh_info");
        $item = new medicion_blh_info();
        $item->postToObject();
        $item->setFecha(date("Y-m-d"));
        //$item->setHospitalId($_POST['hid']);
        $this->transaction->loadClass($item);
        //echo $this->transaction->save(false, true);die;
        if ($this->transaction->save()) {
            echo ' 
                <div class="alert alert-success" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Éxito!</h4>
                  Medición de informaci&oacute;n B&aacute;sica guardada con exito!!
                </div>
            ';
        } else {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Error!</h4>
                  Error guardando la medición de información básica
                </div>
            ';
        }
        die;
    }

    function updateBasicInfo() {

        //echo "<pre>"; print_r($_POST); echo "</pre>"; die;

        $this->masterCtrl->requerirModelo("medicion_blh_info");
        $item = new medicion_blh_info();
        $item->postToObject();
        $item->setFecha(date("Y-m-d"));
        $this->transaction->loadClass($item);
        //echo $this->transaction->save(false, true);die;
        if ($this->transaction->update()) {
            echo ' 
                <div class="alert alert-success" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Éxito!</h4>
                  Medición de informaci&oacute;n B&aacute;sica editada con exito!!
                </div>
            ';
        } else {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Error!</h4>
                  Error editando la medición de información básica
                </div>
            ';
        }
        die;
    }

    function submitProduccion() {
        if (
                !isset($_POST['cantidad_cunas_servicio_recien_nacido']) ||
                !is_int($_POST['cantidad_cunas_servicio_recien_nacido'])
        ) {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Ooops!</h4>
                  Error guardando la medición de información básica <br />
                  El campo -- Cunas en servicio de recien nacido -- debe ser un numero entero
                </div>
            ';
            die;
        }

        if (
                !isset($_POST['cantidad_camas_maternidad']) ||
                !is_int($_POST['cantidad_camas_maternidad'])
        ) {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Ooops!</h4>
                  Error guardando la medición de información básica <br />
                  El campo -- Camas de maternidad -- debe ser un numero entero
                </div>
            ';
            die;
        }


        $this->masterCtrl->requerirModelo("medicion_blh_info");
        $item = new medicion_blh_info();
        $item->postToObject();
        $item->setFecha(date("Y-m-d"));
        $this->transaction->loadClass($item);
        if ($this->transaction->save()) {
            echo ' 
                <div class="alert alert-success" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Éxito!</h4>
                  Medición de informaci&oacute;n B&aacute;sica guardada con exito!!
                </div>
            ';
        } else {
            echo ' 
                <div class="alert alert-error" id="alertResponseBox">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>¡Error!</h4>
                  Error guardando la medición de información básica
                </div>
            ';
        }


        //print_r($item);

        die;
    }

    function insert() {

        if (!$_POST) {
            $this->alert = true;
            $this->alertMsg = "<h4>Alerta!</h4> No se han recibido datos";
            $this->loadContentView("viewAgregar");
            return false;
        }

        if (!$_POST['nombre']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4> Los datos de nombre, estandar y estado son obligatorios";
            $this->loadContentView("viewAgregar");
            return false;
        }

        MasterController::requerirModelo("indicador");
        $item = new indicador();
        if ($_POST['nombre'] != '') {
            $item->nombre['val'] = $_POST['nombre'];
        }



        if ($_POST['estandar_id'] != '') {
            $item->estandar_id['val'] = $_POST['estandar_id'];
        }


        $item->descripcion['val'] = $_POST['descripcion'];

        $this->transaction->loadClass($item);

        if ($this->transaction->save()) {
            $this->done = true;
            $this->doneMsg = "indicador {$_POST[nombre]} Agregado con exito";
            $this->loadContentView("viewAgregar");
            return true;
        }
    }

    function doSubmission() {
        if (!$_POST) {
            $this->alert = true;
            $this->alertMsg = "<h4>Alerta!</h4> No se han recibido datos";
            $this->loadContentView("submision");
            $this->getContentView();
            die;
        } else {
            MasterController::requerirModelo("submision");
            $item = new submision();
        }

        if (!$_POST['nombre_personal']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4>El dato del nombre del personal es obligatorio";
            $this->loadContentView("submision");
            $this->getContentView();
            die;
        } else {
            $item->nombre_personal['val'] = $_POST['nombre_personal'];
        }
        if (!$_POST['historia_clinica']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4>El dato de historia clinica es obligatorio";
            $this->loadContentView("submision");
            $this->getContentView();
            die;
        } else {
            $item->nombre_personal['val'] = $_POST['historia_clinica'];
        }


        if (!$_POST['date']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4> El dato de fecha es obligatorio";
            $this->loadContentView("submision");
            $this->getContentView();
            die;
        } else {
            $item->setFechaId($_POST['date']);
        }

        if (!$_POST['estandar_id']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4>El dato del estandar es obligatorio";
            $this->loadContentView("submision");
            $this->getContentView();
            die;
        } else {
            $item->estandar_id['val'] = $_POST['estandar_id'];
        }

        if (!$_POST['hospital_id']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4>El dato del nombre del Hospital es obligatorio";
            $this->loadContentView("submision");
            $this->getContentView();
            die;
        } else {
            $item->hospital_id['val'] = $_POST['hospital_id'];
        }

        if (!$_POST['servicio_intrahospitalario_id']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4>El dato del nombre del servicio intrahospitalario es obligatorio";
            $this->loadContentView("submision");
            $this->getContentView();
            die;
        } else {
            $item->servicio_intrahospitalario_id['val'] = $_POST['servicio_intrahospitalario_id'];
        }


        //$item->fecha['val'] = date("Y-m-d");
        $item->cargo['val'] = $_POST['cargo'];
        $item->historia_clinica['val'] = $_POST['historia_clinica'];


        //$this->grid = $item;
        //echo "<pre>"; print_r($_POST);echo "<pre>";
        $hexIds = explode("578460921", $_POST['indres']);
        $errFlag = false;
        foreach ($hexIds AS $id) {
            $itemToInsert = $item;
            $id = hexdec($id);
            $field = "indicador" . $id;
            $itemToInsert->valor_indicador_id['val'] = $_POST[$field];
            $itemToInsert->fecha['val'] = date("Y-m-d H:i:s");
            $this->transaction->loadClass($itemToInsert);
            if ($this->transaction->save()) {
                
            } else {
                $errFlag = true;
            }
        }

        if ($errFlag) {
            $this->alert = true;
            $this->alertMsg = "<h4>Alerta!</h4> Error al ingresar los datos";
        } else {
            $this->done = true;
            $this->doneMsg = "Dato ingresados con exito";
        }


        $this->loadContentView("submision");
        $this->getContentView();
        die;
    }

    function viewUpdateForm() {
        $this->loadContentView("updateForm");
    }

    function update() {
        //echo "<pre>"; print_r($_POST); echo "<pre>";


        if (!$_POST) {
            $this->alert = true;
            $this->alertMsg = "<h4>Alerta!</h4> No se han recibido datos";
            $this->loadContentView("default");
            return false;
        }

        if (!$_POST['nombre']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4>Los datos de nombre y estandar son obligatorios";
            $this->loadContentView("default");
            return false;
        }

        if (!$_POST['estandar_id']) {
            $this->error = true;
            $this->errorMsg = "<h4>Campos incompletos!</h4>Los datos de nombre y estandar son obligatorios";
            $this->loadContentView("default");
            return false;
        }


        MasterController::requerirModelo("indicador");
        $item = new indicador();
        if ($_POST['indicador_id'] != '') {
            $item->indicador_id['val'] = $_POST['indicador_id'];
        }

        if ($_POST['estandar_id'] != '') {
            $item->estandar_id['val'] = $_POST['estandar_id'];
        }

        if ($_POST['nombre'] != '') {
            $item->nombre['val'] = $_POST['nombre'];
        }


        $item->descripcion['val'] = $_POST['descripcion'];


        $this->transaction->loadClass($item);

        //echo $this->transaction->update();
        if ($this->transaction->update()) {
            $this->done = true;
            $this->doneMsg = "Indicador {$_POST[nombre]} editado con exito";
            $this->loadContentView("default");
            return true;
        } else {
            $this->loadContentView("default");
            return false;
        }
    }

    function returnOptions() {
        $this->loadContentView("getReferencias");
        $this->getContentView();
        die;
    }

    function formInfoBasica() {
        //sleep(3);
        $this->loadContentView("infoBasicaForm");
        $this->getContentView();
        die;
    }

    function verListadoHospitales() {
        $this->loadContentView("listadoHospitales");
    }

    function verIngresoMediciones() {
        $this->loadContentView("mediciones");
    }

    function viewMedicionesForms() {
        $this->masterCtrl->requerirModelo("hospital");
        $hsp = new hospital();
        if (isset($_GET['idh'])) {
            $hsp->setHospitalId($_GET['idh']);
            $hsp->getValuesBySetedId();
            $this->passParam("hospital", $hsp);
        } else {
            $this->alertMsg = "<h4>Alerta!</h4> No se han recibido el identificador del hospital";
        }
        $this->loadContentView("default");
        $this->getContentView();
        die;
    }

}

?>
