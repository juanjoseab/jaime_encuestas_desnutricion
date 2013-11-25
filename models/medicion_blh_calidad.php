<?php
class medicion_blh_calidad extends OrmClass{
    	protected $_datasource = "medicion_blh_calidad";	public $medicion_blh_calidad_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $fecha = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $fecha_medicion = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $cantidad_analisis_acidez_dormic = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_aceptable_acidez_dormic = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_no_aceptable_acidez_dormic = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $conformidad_acidez_dormic = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $cantidad_analisis_crematocrito = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_aceptable_crematocrito = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_no_aceptable_crematocrito = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $conformidad_crematocrito = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $cantidad_analisis_coliformes = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_aceptable_coliformes = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $cantidad_no_aceptable_coliformes = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $conformidad_coliformes = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $hospital_id = Array ('type' => 'int', 'size' => '10', 'unsigned' => TRUE, 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'hospital', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setMedicionBlhCalidadId($var){
                $this->medicion_blh_calidad_id['val'] = $var;
             }	function getMedicionBlhCalidadId(){
                return $this->medicion_blh_calidad_id['val'];
             }	function setFecha($var){
                $this->fecha['val'] = $var;
             }	function getFecha(){
                return $this->fecha['val'];
             }	function setFechaMedicion($var){
                $this->fecha_medicion['val'] = $var;
             }	function getFechaMedicion(){
                return $this->fecha_medicion['val'];
             }	function setCantidadAnalisisAcidezDormic($var){
                $this->cantidad_analisis_acidez_dormic['val'] = $var;
             }	function getCantidadAnalisisAcidezDormic(){
                return $this->cantidad_analisis_acidez_dormic['val'];
             }	function setCantidadAceptableAcidezDormic($var){
                $this->cantidad_aceptable_acidez_dormic['val'] = $var;
             }	function getCantidadAceptableAcidezDormic(){
                return $this->cantidad_aceptable_acidez_dormic['val'];
             }	function setCantidadNoAceptableAcidezDormic($var){
                $this->cantidad_no_aceptable_acidez_dormic['val'] = $var;
             }	function getCantidadNoAceptableAcidezDormic(){
                return $this->cantidad_no_aceptable_acidez_dormic['val'];
             }	function setConformidadAcidezDormic($var){
                $this->conformidad_acidez_dormic['val'] = $var;
             }	function getConformidadAcidezDormic(){
                return $this->conformidad_acidez_dormic['val'];
             }	function setCantidadAnalisisCrematocrito($var){
                $this->cantidad_analisis_crematocrito['val'] = $var;
             }	function getCantidadAnalisisCrematocrito(){
                return $this->cantidad_analisis_crematocrito['val'];
             }	function setCantidadAceptableCrematocrito($var){
                $this->cantidad_aceptable_crematocrito['val'] = $var;
             }	function getCantidadAceptableCrematocrito(){
                return $this->cantidad_aceptable_crematocrito['val'];
             }	function setCantidadNoAceptableCrematocrito($var){
                $this->cantidad_no_aceptable_crematocrito['val'] = $var;
             }	function getCantidadNoAceptableCrematocrito(){
                return $this->cantidad_no_aceptable_crematocrito['val'];
             }	function setConformidadCrematocrito($var){
                $this->conformidad_crematocrito['val'] = $var;
             }	function getConformidadCrematocrito(){
                return $this->conformidad_crematocrito['val'];
             }	function setCantidadAnalisisColiformes($var){
                $this->cantidad_analisis_coliformes['val'] = $var;
             }	function getCantidadAnalisisColiformes(){
                return $this->cantidad_analisis_coliformes['val'];
             }	function setCantidadAceptableColiformes($var){
                $this->cantidad_aceptable_coliformes['val'] = $var;
             }	function getCantidadAceptableColiformes(){
                return $this->cantidad_aceptable_coliformes['val'];
             }	function setCantidadNoAceptableColiformes($var){
                $this->cantidad_no_aceptable_coliformes['val'] = $var;
             }	function getCantidadNoAceptableColiformes(){
                return $this->cantidad_no_aceptable_coliformes['val'];
             }	function setConformidadColiformes($var){
                $this->conformidad_coliformes['val'] = $var;
             }	function getConformidadColiformes(){
                return $this->conformidad_coliformes['val'];
             }	function setHospitalId($var){
                $this->hospital_id['val'] = $var;
             }	function getHospitalId(){
                return $this->hospital_id['val'];
             }}