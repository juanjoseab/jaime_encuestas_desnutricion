<?php
class medicion_blh_produccion extends OrmClass{
    	protected $_datasource = "medicion_blh_produccion";	public $medicion_blh_produccion_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $fecha = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $fecha_medicion = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_recolectada = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_distribuida = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $uso_leche_recolectada = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $rn_atendidos_ucip_neumo_rn = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $rn_tratados_leche_humana = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cobertura_atencion = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $cantidad_partos_atendidos = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_madres_donadoras = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $captacion_donadoras = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $hospital_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'hospital', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setMedicionBlhProduccionId($var){
                $this->medicion_blh_produccion_id['val'] = $var;
             }	function getMedicionBlhProduccionId(){
                return $this->medicion_blh_produccion_id['val'];
             }	function setFecha($var){
                $this->fecha['val'] = $var;
             }	function getFecha(){
                return $this->fecha['val'];
             }	function setFechaMedicion($var){
                $this->fecha_medicion['val'] = $var;
             }	function getFechaMedicion(){
                return $this->fecha_medicion['val'];
             }	function setLitrosLecheRecolectada($var){
                $this->litros_leche_recolectada['val'] = $var;
             }	function getLitrosLecheRecolectada(){
                return $this->litros_leche_recolectada['val'];
             }	function setLitrosLecheDistribuida($var){
                $this->litros_leche_distribuida['val'] = $var;
             }	function getLitrosLecheDistribuida(){
                return $this->litros_leche_distribuida['val'];
             }	function setUsoLecheRecolectada($var){
                $this->uso_leche_recolectada['val'] = $var;
             }	function getUsoLecheRecolectada(){
                return $this->uso_leche_recolectada['val'];
             }	function setRnAtendidosUcipNeumoRn($var){
                $this->rn_atendidos_ucip_neumo_rn['val'] = $var;
             }	function getRnAtendidosUcipNeumoRn(){
                return $this->rn_atendidos_ucip_neumo_rn['val'];
             }	function setRnTratadosLecheHumana($var){
                $this->rn_tratados_leche_humana['val'] = $var;
             }	function getRnTratadosLecheHumana(){
                return $this->rn_tratados_leche_humana['val'];
             }	function setCoberturaAtencion($var){
                $this->cobertura_atencion['val'] = $var;
             }	function getCoberturaAtencion(){
                return $this->cobertura_atencion['val'];
             }	function setCantidadPartosAtendidos($var){
                $this->cantidad_partos_atendidos['val'] = $var;
             }	function getCantidadPartosAtendidos(){
                return $this->cantidad_partos_atendidos['val'];
             }	function setCantidadMadresDonadoras($var){
                $this->cantidad_madres_donadoras['val'] = $var;
             }	function getCantidadMadresDonadoras(){
                return $this->cantidad_madres_donadoras['val'];
             }	function setCaptacionDonadoras($var){
                $this->captacion_donadoras['val'] = $var;
             }	function getCaptacionDonadoras(){
                return $this->captacion_donadoras['val'];
             }	function setHospitalId($var){
                $this->hospital_id['val'] = $var;
             }	function getHospitalId(){
                return $this->hospital_id['val'];
             }}