<?php
class medicion_blh_funcionamiento_mensual extends OrmClass{
    	protected $_datasource = "medicion_blh_funcionamiento_mensual";	public $medicion_blh_funcionamiento_mensual_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $fecha = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $fecha_medicion = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $actividades_recoleccion_extrahospitalaria = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $actividades_promocion_donacion_extrahospitalaria = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $hospital_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'hospital', 'val'=>''); 	public $medicion_tardia = Array ('type' => 'tinyint', 'null' =>  'NO', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setMedicionBlhFuncionamientoMensualId($var){
                $this->medicion_blh_funcionamiento_mensual_id['val'] = $var;
             }	function getMedicionBlhFuncionamientoMensualId(){
                return $this->medicion_blh_funcionamiento_mensual_id['val'];
             }	function setFecha($var){
                $this->fecha['val'] = $var;
             }	function getFecha(){
                return $this->fecha['val'];
             }	function setFechaMedicion($var){
                $this->fecha_medicion['val'] = $var;
             }	function getFechaMedicion(){
                return $this->fecha_medicion['val'];
             }	function setActividadesRecoleccionExtrahospitalaria($var){
                $this->actividades_recoleccion_extrahospitalaria['val'] = $var;
             }	function getActividadesRecoleccionExtrahospitalaria(){
                return $this->actividades_recoleccion_extrahospitalaria['val'];
             }	function setActividadesPromocionDonacionExtrahospitalaria($var){
                $this->actividades_promocion_donacion_extrahospitalaria['val'] = $var;
             }	function getActividadesPromocionDonacionExtrahospitalaria(){
                return $this->actividades_promocion_donacion_extrahospitalaria['val'];
             }	function setHospitalId($var){
                $this->hospital_id['val'] = $var;
             }	function getHospitalId(){
                return $this->hospital_id['val'];
             }	function setMedicionTardia($var){
                $this->medicion_tardia['val'] = $var;
             }	function getMedicionTardia(){
                return $this->medicion_tardia['val'];
             }}