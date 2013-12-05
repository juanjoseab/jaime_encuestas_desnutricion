<?php
if ($this->acl->acl("Submision")) {
    MasterController::requerirModelo("medicion_blh_calidad");
    MasterController::requerirModelo("medicion_blh_funcionamiento");
    MasterController::requerirModelo("medicion_blh_info");
    MasterController::requerirModelo("medicion_blh_produccion");
    $vcalidad = new medicion_blh_calidad();
    $vfuncion = new medicion_blh_funcionamiento();
    $vinfo = new medicion_blh_info();
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
                            <input type="text" class="datepicker signedField notNulleable" maxsize=""  required="required"  placeholder="Fecha Medicion"  id="Fecha Medicion"  name="fecha_medicion" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" >Litros de leche recolectada</label>
                        <div class="controls">
                            <input type="text" class=" stringField signedField notNulleable" maxsize=""  required="required"  placeholder="Litros Leche Recolectada"  id="Litros Leche Recolectada"  name="litros_leche_recolectada" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" >Litros de leche distribuida</label>
                        <div class="controls">
                            <input type="text" class=" stringField signedField notNulleable" maxsize=""  required="required"  placeholder="Litros Leche Distribuida"  id="Litros Leche Distribuida"  name="litros_leche_distribuida" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" >Uso de leche recolectada</label>

                    </div><div class="control-group">
                        <label class="control-label" >Recien nacidos atendidos en UCIP/Neonatología/RN</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Rn Atendidos Ucip Neumo Rn"  id="Rn Atendidos Ucip Neumo Rn"  name="rn_atendidos_ucip_neumo_rn" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" >Recien nacidos tratados con leche humana</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Rn Tratados Leche Humana"  id="Rn Tratados Leche Humana"  name="rn_tratados_leche_humana" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" >Cobertura de atención</label>

                    </div><div class="control-group">
                        <label class="control-label" >Cantidad de partos atendidos</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Cantidad Partos Atendidos"  id="Cantidad Partos Atendidos"  name="cantidad_partos_atendidos" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" >Cantidad de madres donadoras</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Cantidad Madres Donadoras"  id="Cantidad Madres Donadoras"  name="cantidad_madres_donadoras" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" >Captacion de donadoras</label>

                    </div>

                   <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                                   name="hospital_id" />


                    <div class="control-group">
                        <div class="controls">

                            <button type="button" class="btn sbmttest">Guardar</button>
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
                            <input type="text" class="datepicker signedField notNulleable" maxsize="" required="required" placeholder="Fecha Medicion" id="Fecha Medicion" name="fecha_medicion" value="">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad aceptable de acidez dormic</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Aceptable Acidez Dormic" id="Cantidad Aceptable Acidez Dormic" name="cantidad_aceptable_acidez_dormic" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad no aceptable de acidez dormic</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad No Aceptable Acidez Dormic" id="Cantidad No Aceptable Acidez Dormic" name="cantidad_no_aceptable_acidez_dormic" value="">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Conformidad acidez dormic</label>

                    </div>
                    

                    
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad aceptable de crematocrito</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Aceptable Crematocrito" id="Cantidad Aceptable Crematocrito" name="cantidad_aceptable_crematocrito" value="">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad no aceptable de crematocrito</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad No Aceptable Crematocrito" id="Cantidad No Aceptable Crematocrito" name="cantidad_no_aceptable_crematocrito" value="">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Conformidad crematocrito</label>

                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad aceptable de coliformes</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Aceptable Coliformes" id="Cantidad Aceptable Coliformes" name="cantidad_aceptable_coliformes" value="">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad no aceptable de coliformes</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad No Aceptable Coliformes" id="Cantidad No Aceptable Coliformes" name="cantidad_no_aceptable_coliformes" value="">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Conformidad coliformes</label>

                    </div>


                    <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                                   name="hospital_id" />


                    <div class="control-group">
                        <div class="controls">

                            <button type="button" class="btn sbmttest">Guardar</button>
                        </div>
                    </div>
                </fieldset></form>




        </div>
        <div class="tab-pane" id="settings">
            <h2>Variables de funcionamiento</h2>
            <p>
                Llene los campos que aparecen abajo, <span class="label label-important">Todos son obligatorios</span>.
            </p>
            <form accept-charset="utf-8" class="form-horizontal" id="infoFuncionamiento" method="POST" action="http://encuestanutricional.org/dev/?v=medicionblh&action=saveInfoFuncionamiento&idh=" ><fieldset><legend></legend>


                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Fecha medicion</label>
                        <div class="controls">
                            <input type="text" class="datepicker signedField notNulleable" maxsize=""  required="required"  placeholder="Fecha Medicion"  id="Fecha Medicion"  name="fecha_medicion" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Centros recolectores extrahospitalarios</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Centros Recolectores Extrahospitalarios"  id="Centros Recolectores Extrahospitalarios"  name="centros_recolectores_extrahospitalarios" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Clinicas de lactancia materna</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Clinicas Lactancia Materna"  id="Clinicas Lactancia Materna"  name="clinicas_lactancia_materna" value="" />
                        </div>
                    </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Actividades de recoleccion extrahospitalaria</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Actividades Recoleccion Extrahospitalaria"  id="Actividades Recoleccion Extrahospitalaria"  name="actividades_recoleccion_extrahospitalaria" value="" />
                        </div>
                    </div><div class="control-group">
                        <label type="text" class="control-label" for="inputEmail">Actividades de promocion donacion extrahospitalaria</label>
                        <div class="controls">
                            <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Actividades Promocion Donacion Extrahospitalaria"  id="Actividades Promocion Donacion Extrahospitalaria"  name="actividades_promocion_donacion_extrahospitalaria" value="" />
                        </div>
                    </div>

                    <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                                   name="hospital_id" />



                    <div class="control-group">
                        <div class="controls">

                            <button type="button" class="btn sbmttest">Guardar</button>
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
