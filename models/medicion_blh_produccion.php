<?php
class medicion_blh_produccion extends OrmClass{
    	protected $_datasource = "medicion_blh_produccion";	public $medicion_blh_produccion_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $fecha = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $fecha_medicion = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_recolectada = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_distribuida = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_recolectada_intrahospitalaria = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_recolectada_extrahospitalaria = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_pasteurizada = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $litros_leche_descartada = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $uso_leche_recolectada = Array ('type' => '', 'null' =>  'YES', 'val'=>''); 	public $rn_atendidos_ucip_neumo_rn = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $rn_tratados_leche_humana = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cobertura_atencion = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $cantidad_partos_atendidos = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_madres_donadoras = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $captacion_donadoras = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $numero_madres_donadoras_internas = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $numero_madres_donadoras_externas = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $hospital_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'hospital', 'val'=>''); 	public $medicion_tardia = Array ('type' => 'tinyint', 'null' =>  'NO', 'val'=>''); 	function getReference() {
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
             }	function setLitrosLecheRecolectadaIntrahospitalaria($var){
                $this->litros_leche_recolectada_intrahospitalaria['val'] = $var;
             }	function getLitrosLecheRecolectadaIntrahospitalaria(){
                return $this->litros_leche_recolectada_intrahospitalaria['val'];
             }	function setLitrosLecheRecolectadaExtrahospitalaria($var){
                $this->litros_leche_recolectada_extrahospitalaria['val'] = $var;
             }	function getLitrosLecheRecolectadaExtrahospitalaria(){
                return $this->litros_leche_recolectada_extrahospitalaria['val'];
             }	function setLitrosLechePasteurizada($var){
                $this->litros_leche_pasteurizada['val'] = $var;
             }	function getLitrosLechePasteurizada(){
                return $this->litros_leche_pasteurizada['val'];
             }	function setLitrosLecheDescartada($var){
                $this->litros_leche_descartada['val'] = $var;
             }	function getLitrosLecheDescartada(){
                return $this->litros_leche_descartada['val'];
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
             }	function setNumeroMadresDonadorasInternas($var){
                $this->numero_madres_donadoras_internas['val'] = $var;
             }	function getNumeroMadresDonadorasInternas(){
                return $this->numero_madres_donadoras_internas['val'];
             }	function setNumeroMadresDonadorasExternas($var){
                $this->numero_madres_donadoras_externas['val'] = $var;
             }	function getNumeroMadresDonadorasExternas(){
                return $this->numero_madres_donadoras_externas['val'];
             }	function setHospitalId($var){
                $this->hospital_id['val'] = $var;
             }	function getHospitalId(){
                return $this->hospital_id['val'];
             }	function setMedicionTardia($var){
                $this->medicion_tardia['val'] = $var;
             }	function getMedicionTardia(){
                return $this->medicion_tardia['val'];
             }}