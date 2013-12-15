<?php
if ($this->acl->acl("Submision")) {
    MasterController::requerirModelo("medicion_blh_calidad");
    MasterController::requerirModelo("medicion_blh_funcionamiento_mensual");
    MasterController::requerirModelo("medicion_blh_produccion");
    $vcalidad = new medicion_blh_calidad();
    $vfuncion = new medicion_blh_funcionamiento_mensual();
    $vproduccion = new medicion_blh_produccion();
    ?>





    <div id="mensajesDeAlerta"></div>
    <?php
    $alerts = $this->activesMsgs();
    if ($alerts) {
        echo $alerts;
    }
    ?>

    <ul class="nav nav-tabs" id="myTab">
        <li><a href="#profile">Producción</a></li>
        <li><a href="#messages">Calidad</a></li>
        <li><a href="#settings">Funcionamiento</a></li>
    </ul>

    <div class="tab-content">


        <div class="tab-pane" id="profile">
            <h2>Variables de Producción</h2>
            <p>
                Llene los campos que aparecen abajo, <span class="label label-important">Todos son obligatorios</span>.
            </p>
            <form accept-charset="utf-8" class="form-horizontal" id="infoProduccion" method="POST" action="http://localhost/projects/jaime_encuestas_desnutricion?v=medicionblh&action=saveInfoBasica&idh=" ><fieldset><legend></legend>
                    <div class="control-group">
                        <label class="control-label" >Fecha de medición</label>
                        <div class="controls">
                            A&ntilde;o: <select name="anio" 
                                                rel="produccion" 
                                                relhid="<?= $this->params['hospital']->getHospitalId() ?>" 
                                                class="input-small bindAnio">
                                <option value="">A&ntilde;o</option>
                                <?php
                                for ($i = date('Y') - 2; $i <= date('Y') + 1; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>  
                            Mes: <select name="mes" id="produccion-mes" class="input-small">

                            </select>

                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" >Litros de leche recolectada intrahospitalaria</label>
                        <div class="controls">                            
                            <input id="litros_leche_recolectada_intrahospitalaria" type="text" name="litros_leche_recolectada_intrahospitalaria" value="0" >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Litros de leche recolectada extrahospitalaria</label>
                        <div class="controls">
                           
                            <input id="litros_leche_recolectada_extrahospitalaria" type="text" name="litros_leche_recolectada_extrahospitalaria" value="0" >
                        </div>
                    </div>
                    
                    
                    
                    <div class="control-group">
                        <label class="control-label" >Litros de leche recolectada</label>
                        <div class="controls">
                            <div id="LitrosLecheRecolectadaLabel" class="text-info"><strong></strong></div>
                            <input id="LitrosLecheRecolectada" type="hidden" name="litros_leche_recolectada" value="0" >                            
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Litros de leche distribuida</label>
                        <div class="controls">
                            <input type="text" class="numericfield stringField signedField notNulleable" maxsize=""  required="required"  placeholder="Litros Leche Distribuida"  
                                   id="LitrosLecheDistribuida"  name="litros_leche_distribuida" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Uso de leche recolectada</label>
                        <div class="controls">
                            <div id="usolecherecolectadaLabel" class="text-info"><strong></strong></div>
                            <input id="usolecherecolectada" type="hidden" name="uso_leche_recolectada" value="0" >
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" >Litros de leche pasteurizada</label>
                        <div class="controls">
                            <input type="text" class="numericfield stringField signedField notNulleable" 
                                   required="required"  placeholder="Litros Leche Pasteurizada"  
                                   id="LitrosLechePasteurizada"  name="litros_leche_pasteurizada" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Litros de leche descartada</label>
                        <div class="controls">
                            <input type="text" class="numericfield stringField signedField notNulleable" 
                                   required="required"  placeholder="Litros Leche Descartada"  
                                   id="LitrosLecheDescartada"  name="litros_leche_descartada" value="" />
                        </div>
                    </div>
                                        
                    <div class="control-group">
                        <label class="control-label" >Recien nacidos atendidos en UCIP/Neonatología/RN</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize=""  required="required"  
                                   placeholder="Rn Atendidos Ucip Neumo Rn"  
                                   id="RnAtendidosUcipNeumoRn"  
                                   name="rn_atendidos_ucip_neumo_rn" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Recien nacidos tratados con leche humana</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize=""  
                                   required="required"  placeholder="Rn Tratados Leche Humana"  
                                   id="RnTratadosLecheHumana"  
                                   name="rn_tratados_leche_humana" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Cobertura de atención</label>
                        <div class="controls">
                            <div id="coberturaatencionLabel" class="text-info"><strong></strong></div>
                            <input id="coberturaatencion" type="hidden" name="cobertura_atencion" value="0" >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Cantidad de partos atendidos</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" 
                                   required="required"  placeholder="Cantidad Partos Atendidos"  
                                   id="CantidadPartosAtendidos"  name="cantidad_partos_atendidos" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Cantidad de madres donadoras internas</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize=""
                                   required="required"  placeholder="Cantidad Madres Donadoras Internas"  
                                   id="CantidadMadresDonadorasInternas" name="numero_madres_donadoras_internas" value="" />
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" >Cantidad de madres donadoras externas</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" 
                                   required="required"  placeholder="Cantidad Madres Donadoras externas"  
                                   id="CantidadMadresDonadorasExternas" name="numero_madres_donadoras_externas" value="" />
                        </div>
                    </div>
                    
                    
                    
                    <div class="control-group">
                        <label class="control-label" >Cantidad de madres donadoras</label>
                        <div class="controls">                            
                            <div id="CantidadMadresDonadorasLabel" class="text-info"><strong></strong></div>
                            <input id="CantidadMadresDonadoras" type="hidden" name="cantidad_madres_donadoras" value="0" >                            
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Captacion de donadoras</label>
                        <div class="controls">
                            <div id="captaciondonadorasLabel" class="text-info"><strong></strong></div>
                            <input id="captaciondonadoras" type="hidden" name="captacion_donadoras" value="0" >
                        </div>
                    </div>

                    <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                           name="hospital_id" />


                    <div class="control-group">
                        <div class="controls">

                            <button id="sbmtProd" type="button" class="btn sbmttest">Guardar</button>
                        </div>
                    </div>
                </fieldset></form>
        </div>

        <div class="tab-pane" id="messages">
            <h2>Variables de Calidad</h2>
            <p>
                Llene los campos que aparecen abajo, <span class="label label-important">Todos son obligatorios</span>.
            </p>
            <form accept-charset="utf-8" class="form-horizontal" id="infoCalidad" method="POST" action="http://encuestanutricional.org/dev/?v=medicionblh&amp;action=saveInfoCalidad&amp;idh="><fieldset><legend></legend>

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Fecha de medicion</label>
                        <div class="controls">
                            A&ntilde;o: <select name="anio" 
                                                rel="calidad" 
                                                relhid="<?= $this->params['hospital']->getHospitalId() ?>" 
                                                class="input-small bindAnio">
                                <option value="">A&ntilde;o</option>
                                <?php
                                for ($i = date('Y') - 2; $i <= date('Y') + 1; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>  
                            Mes: <select name="mes" id="calidad-mes" class="input-small">

                            </select>

                        </div>
                    </div>
                    <h3>Acidez Dormic</h3>
                    <div class="control-group">
                        <label class="control-label" for="CantidadAceptableAcidezDormic">Número de análisis aceptable</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize="" 
                                   required="required" placeholder="Cantidad Aceptable Acidez Dormic" 
                                   id="CantidadAceptableAcidezDormic" name="cantidad_aceptable_acidez_dormic" 
                                   value=""> <strong> <span class="text-info">&lt;= 8</span></strong>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="CantidadNoAceptableAcidezDormic">Número de análisis <b>no</b> aceptable</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize="" required="required" 
                                   placeholder="Cantidad No Aceptable Acidez Dormic" 
                                   id="CantidadNoAceptableAcidezDormic" name="cantidad_no_aceptable_acidez_dormic" 
                                   value=""> <strong> <span class="text-error">&gt; 8</span></strong>
                        </div> 
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="TotalAcidezDormic">Total acidez dormic</label>
                        <div class="controls">
                            <div id="TotalAcidezDormicLabel" class="text-info"><strong></strong></div>
                            <input id="TotalAcidezDormic" type="hidden" name="total_acidez_dormic" value="0" >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="ConformidadAcidezDormic">Conformidad acidez dormic</label>
                        <div class="controls">
                            <div id="ConformidadAcidezDormicLabel" class="text-info"><strong></strong></div>
                            <input id="ConformidadAcidezDormic" type="hidden" name="conformidad_acidez_dormic" value="0" >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="acidez_dormic_promedio">Promedio acidez dormic</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable"
                                   required="required" 
                                   placeholder="Promedio Acidez Dormic" 
                                   id="acidez_dormic_promedio" name="acidez_dormic_promedio" 
                                   value="">
                        </div> 
                    </div>

                    <h3>crematocrito</h3>
                    <div class="control-group">
                        <label class="control-label" for="CantidadAceptableCrematocrito">Número de análisis aceptable</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Aceptable Crematocrito" 
                                   id="CantidadAceptableCrematocrito" 
                                   name="cantidad_aceptable_crematocrito" 
                                   value=""> <strong><span class="text-info">&lt;= 250Kcal/L</span></strong>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="CantidadNoAceptableCrematocrito">Número de análisis <b>no</b> aceptable</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize="" 
                                   required="required" placeholder="Cantidad No Aceptable Crematocrito" 
                                   id="CantidadNoAceptableCrematocrito" name="cantidad_no_aceptable_crematocrito" 
                                   value=""> <strong> <span class="text-error">Menor</span></strong>
                            
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="TotalCrematocrito">Total crematocrito</label>
                        <div class="controls">
                            <div id="TotalCrematocritoLabel" class="text-info"><strong></strong></div>
                            <input id="TotalCrematocrito" type="hidden" name="total_crematocrito" value="0" >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="ConformidadCrematocrito">Conformidad crematocrito</label>
                        <div class="controls">
                            <div id="ConformidadCrematocritoLabel" class="text-info"><strong></strong></div>
                            <input id="ConformidadCrematocrito" type="hidden" name="conformidad_crematocrito" value="0" >
                        </div>

                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="crematocrito_promedio">Promedio crematocrito</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable"
                                   required="required" 
                                   placeholder="Promedio crematocrito" 
                                   id="crematocrito_promedio" name="crematocrito_promedio" 
                                   value="">
                        </div> 
                    </div>
                    
                    <h3>Coliformes</h3>
                    <div class="control-group">
                        <label class="control-label" for="CantidadAceptableColiformes">Número de análisis aceptable</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize="" 
                                   required="required" placeholder="Cantidad Aceptable Coliformes" 
                                   id="CantidadAceptableColiformes" 
                                   name="cantidad_aceptable_coliformes" value=""> <strong> <span class="text-info">Ausente</span></strong>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="CantidadNoAceptableColiformes">Número de análisis <b>no</b> aceptable</label>
                        <div class="controls">
                            <input type="text" class="numericfield intField signedField notNulleable" maxsize="" 
                                   required="required" placeholder="Cantidad No Aceptable Coliformes" 
                                   id="CantidadNoAceptableColiformes" 
                                   name="cantidad_no_aceptable_coliformes" value="">
                                <strong> <span class="text-error">Presente</span></strong>
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="TotalColiformes">Total Coliformes</label>
                        <div class="controls">
                            <div id="TotalColiformesLabel" class="text-info"><strong></strong></div>
                            <input id="TotalColiformes" type="hidden" name="total_coliformes" value="0" >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="ConformidadColiformes">Conformidad coliformes</label>
                        <div class="controls">
                            <div id="ConformidadColiformesLabel" class="text-info"><strong></strong></div>
                            <input id="ConformidadColiformes" type="hidden" name="conformidad_coliformes" value="0" >
                        </div>
                    </div>
                    
                    <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                           name="hospital_id" />


                    <div class="control-group">
                        <div class="controls">

                            <button type="button" id="sbmtCalidad" class="btn sbmttest">Guardar</button>
                        </div>
                    </div>
                </fieldset></form>




        </div>
        <div class="tab-pane" id="settings">
            <h2>Variables de funcionamiento</h2>
            <p>
                Llene los campos que aparecen abajo, <span class="label label-important">Todos son obligatorios</span>.
            </p>
            <hr />
            <h3>Mediciones mensuales</h3>
            <form accept-charset="utf-8" class="form-horizontal" id="infoFuncionamientoMensual" method="POST" 
                  action="http://encuestanutricional.org/dev/?v=medicionblh&action=saveInfoFuncionamientoAnual&idh=" ><fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" >Fecha de medición</label>
                        <div class="controls">
                            A&ntilde;o: <select name="anio" 
                                                rel="funcionamiento" 
                                                relhid="<?= $this->params['hospital']->getHospitalId() ?>" 
                                                class="input-small bindAnio">
                                <option value="">A&ntilde;o</option>
                                <?php
                                for ($i = date('Y') - 2; $i <= date('Y') + 1; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>  
                            Mes: <select name="mes" id="funcionamiento-mes" class="input-small">

                            </select>

                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label type="text" class="control-label" for="numero_madres_consegeria_individual">Numero de madres que reciben consegería individual</label>
                        <div class="controls">
                            <input type="text" id="numero_madres_consegeria_individual" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Madres que reciben consegeria individual"
                                   name="numero_madres_consegeria_individual" value="" />
                        </div>
                    </div>
                    
                    <h4>Actividades de recolección extrahospitalaria</h4>                    
                    <div class="control-group">
                        <label type="text" class="control-label" for="recoleccion_visita_domiciliar">Visita domiciliar</label>
                        <div class="controls">
                            <input type="text" id="recoleccion_visita_domiciliar" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Actividades Promocion Donacion Extrahospitalaria"
                                   name="recoleccion_visita_domiciliar" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label type="text" class="control-label" for="recoleccion_centros_recolectores">
                            Centros recolectores</label>
                        <div class="controls">
                            <input type="text" id="recoleccion_centros_recolectores" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Centros recolectores"
                                   name="recoleccion_centros_recolectores" value="" />
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label type="text" class="control-label" for="recoleccion_otras_actividades_especiales">
                            Otras actividades especiales</label>
                        <div class="controls">
                            <input type="text" id="recoleccion_centros_recolectores" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Otras actividades especiales"
                                   name="recoleccion_otras_actividades_especiales" value="" />
                        </div>
                    </div>
                    
                    
                    <h4>Actividades de promocion donación extrahospitalaria</h4>                    
                    <div class="control-group">
                        <label 
                            class="control-label" 
                            for="promocion_radio">Radio</label>
                        <div class="controls">
                            <input type="text" id="promocion_radio" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Promociones por radio"
                                   name="promocion_radio" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label 
                            class="control-label" 
                            for="promocion_television">Televisión</label>
                        <div class="controls">
                            <input type="text" id="promocion_television" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Promociones por TV"
                                   name="promocion_television" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label 
                            class="control-label" 
                            for="promocion_prensa_medios_escritos">Prensa y medios escritos</label>
                        <div class="controls">
                            <input type="text" id="promocion_prensa_medios_escritos" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Promociones por Prensa y medios escritos"
                                   name="promocion_prensa_medios_escritos" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label 
                            class="control-label" 
                            for="promocion_perifoneo">Perifoneo</label>
                        <div class="controls">
                            <input type="text" id="promocion_perifoneo" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Perifoneo"
                                   name="promocion_perifoneo" value="" />
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label 
                            class="control-label" 
                            for="promocion_servicios_salud">Servicios de salud</label>
                        <div class="controls">
                            <input type="text" id="promocion_servicios_salud" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Perifoneo"
                                   name="promocion_servicios_salud" value="" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label 
                            class="control-label" 
                            for="promocion_talleres_charlas_conferencias">Talleres, charlas conferencias</label>
                        <div class="controls">
                            <input type="text" id="promocion_talleres_charlas_conferencias" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Perifoneo"
                                   name="promocion_talleres_charlas_conferencias" value="" />
                        </div>
                    </div>
                    
                    <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                           name="hospital_id" />



                    <div class="control-group">
                        <div class="controls">

                            <button type="button" id="sbmtFuncMensual" class="btn sbmttest">Guardar</button>
                        </div>
                    </div>
                </fieldset></form>
            
            
            
            
            
            <h3>Mediciones anuales</h3>
            
            <?php
            
            $anios = $this->getAvailableYears($this->params['hospital']->getHospitalId());
                                
                                //echo "<pre>"; print_r($anios); echo "</pre>";
            ?>
              
            <form accept-charset="utf-8" class="form-horizontal" id="infoFuncionamientoAnual" method="POST" action="http://encuestanutricional.org/dev/?v=medicionblh&action=saveInfoFuncionamientoAnual&idh=" ><fieldset>
                    
                    
                    <div class="control-group">
                        <label class="control-label" >A&ntilde;o de medición</label>
                        <div class="controls">
                            <select name="anio" >
                                <option value="">A&ntilde;o</option>
                                <?php
                                
                                
                                
                                
                                for ($i = date('Y') - 2; $i <= date('Y') + 1; $i++) {
                                    if(!in_array($i, $anios)){
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>  
                            

                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="numero_tesis_estudios">
                            Numero de tésis o estudios de investigación
                        </label>
                        <div class="controls">
                            <input type="text" 
                                   class="numericfield intField signedField notNulleable" 
                                   required="required"  
                                   placeholder="Numero de tésis o estudios de investigación "  
                                   id="numero_tesis_estudios"  
                                   name="numero_tesis_estudios" value="" />
                        </div>
                    </div>
                    
                    
                    
                    
                    <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                           name="hospital_id" />



                    <div class="control-group">
                        <div class="controls">

                            <button type="button" id="sbmtFuncAnual" class="btn sbmttest">Guardar</button>
                        </div>
                    </div>
                </fieldset></form>

        </div>
    </div>



    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Respuesta</h3>
        </div>
        <div class="modal-body" id="modalBodyP">

        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>            
        </div>
    </div>


<? } else { ?>
    <div class="span6">
        <div class="alert alert-block">

            <h4>Acceso no permitido!</h4>
            No tiene suficientes privilegios en el sistema para poder agregar datos.
        </div>
    </div>


<?php } ?>
