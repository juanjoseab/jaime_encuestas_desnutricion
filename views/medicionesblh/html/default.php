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




    <div class="span9" id="TopForm">

        <h1>Ingreso de mediciones <small>para bancos de leche humana</small></h1>
        <p>
            Llene los campos que aparecen abajo, <span class="label label-important">Todos son obligatorios</span>.
        </p>
        <div id="mensajesDeAlerta"></div>
        <?php
        $alerts = $this->activesMsgs();
        if ($alerts) {
            echo $alerts;
        }
        ?>

        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home">Información básica</a></li>
            <li><a href="#profile">Variables de Producción</a></li>
            <li><a href="#messages">Variables de Calidad</a></li>
            <li><a href="#settings">Variables de funcionamiento</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <h2>Información básica</h2>


                <form class="form-horizontal" id="infoBasica">

                    <fieldset>
                        <legend></legend>
                        <div class="control-group">
                            <label class="control-label" >Fecha medición</label>
                            <div class="controls">
                                <input type="text" 
                                       required="required"  
                                       placeholder="Fecha Medicion"  
                                       id="FechaMedicion"  
                                       name="fecha_medicion" 
                                       value="" 
                                       class="input-large datepicker"
                                       />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Hospital</label>
                            <div class="controls">
                                <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                                       name="hospital_id" />
                                <span class="input-xxlarge uneditable-input">
                                    <?= $this->params['hospital']->getNombre() ?>
                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" >Inauguración</label>
                            <div class="controls">
                                <input type="text" 
                                       class="signedField notNulleable datepicker" 
                                       required="required"  
                                       placeholder="Inauguracion"
                                       id="Inauguracion"
                                       name="inauguracion" 
                                       value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Cantidad de cunas en servicio de recien nacido</label>
                            <div class="controls">
                                <input type="text" class=" intField signedField notNulleable" maxsize=""  
                                       required="required"  
                                       placeholder="Cantidad Cunas Servicio Recien Nacido"  
                                       id="Cantidad Cunas Servicio Recien Nacido"  
                                       name="cantidad_cunas_servicio_recien_nacido" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Cantidad de camas en maternidad</label>
                            <div class="controls">
                                <input type="text" class=" intField signedField notNulleable" maxsize=""  
                                       required="required"  placeholder="Cantidad Camas Maternidad"  
                                       id="Cantidad Camas Maternidad"  name="cantidad_camas_maternidad" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Nombre de la coordinadora</label>
                            <div class="controls">
                                <input type="text" class=" stringField signedField notNulleable" maxsize=""  required="required"  placeholder="Nombre Coordinadora"  id="Nombre Coordinadora"  name="nombre_coordinadora" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Profesión de la coordinadora</label>
                            <div class="controls">
                                <input type="text" class=" intField unsignedField notNulleable" maxsize="10"  required="required"  placeholder="Profesion de la Coordinadora"  id="ProfesionCordinadoraId"  name="profesion_cordinadora" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Teléfono</label>
                            <div class="controls">
                                <textarea class=" textField signedField Nulleable"  placeholder="Telefono"  id="Telefono"  name="telefono" ></textarea>
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Email contacto</label>
                            <div class="controls">
                                <textarea class=" textField signedField Nulleable"  placeholder="Email de contacto"  id="EmailContacto"  name="email_contacto" ></textarea>
                            </div>
                        </div><div class="control-group">
                            <div class="controls">

                                <button type="button" class="btn" id="sbmt">Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>

                <?php
                /* echo $vinfo->constructForm(
                  "infoBasica",
                  $this->createLink("medicionblh", "saveInfoBasica", "idh=". $_GET['itemId']),
                  "",
                  "POST",
                  "Guardar"); */
                ?>
            </div>

            <div class="tab-pane" id="profile">
                <h2>Variables de Producción</h2>

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
                        
                        <div class="control-group">
                            <label class="control-label">Hospital</label>
                            <div class="controls">
                                <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                                       name="hospital_id" />
                                <span class="input-xxlarge uneditable-input">
                                    <?= $this->params['hospital']->getNombre() ?>
                                </span>
                            </div>
                        </div>
                        
                        
						<div class="control-group">
                            <div class="controls">

                                <button type="button" class="btn sbmttest">Guardar</button>
                            </div>
                        </div>
                    </fieldset></form>
            </div>

            <div class="tab-pane" id="messages">
                <h2>Variables de Calidad</h2>
                
                <form accept-charset="utf-8" class="form-horizontal" id="infoCalidad" method="POST" action="http://encuestanutricional.org/dev/?v=medicionblh&amp;action=saveInfoCalidad&amp;idh="><fieldset><legend></legend>
                	
				<div class="control-group">
                        <label class="control-label" for="inputEmail">Fecha de medicion</label>
                        <div class="controls">
                          <input type="text" class="datepicker signedField notNulleable" maxsize="" required="required" placeholder="Fecha Medicion" id="Fecha Medicion" name="fecha_medicion" value="">
                        </div>
                      </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad de analisis de acidez dormic</label>
                        <div class="controls">
                          <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Analisis Acidez Dormic" id="Cantidad Analisis Acidez Dormic" name="cantidad_analisis_acidez_dormic" value="">
                        </div>
                      </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad aceptable de acidez dormic</label>
                        <div class="controls">
                          <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Aceptable Acidez Dormic" id="Cantidad Aceptable Acidez Dormic" name="cantidad_aceptable_acidez_dormic" value="">
                        </div>
                      </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad no aceptable de acidez dormic</label>
                        <div class="controls">
                          <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad No Aceptable Acidez Dormic" id="Cantidad No Aceptable Acidez Dormic" name="cantidad_no_aceptable_acidez_dormic" value="">
                        </div>
                      </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Conformidad acidez dormic</label>
                        
                      </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad de analisis de crematocrito</label>
                        <div class="controls">
                          <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Analisis Crematocrito" id="Cantidad Analisis Crematocrito" name="cantidad_analisis_crematocrito" value="">
                        </div>
                      </div><div class="control-group">
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
                        
                      </div><div class="control-group">
                        <label class="control-label" for="inputEmail">Cantidad de analisis de coliformes</label>
                        <div class="controls">
                          <input type="text" class=" intField signedField notNulleable" maxsize="" required="required" placeholder="Cantidad Analisis Coliformes" id="Cantidad Analisis Coliformes" name="cantidad_analisis_coliformes" value="">
                        </div>
                      </div><div class="control-group">
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
                      
                      
                      <div class="control-group">
                            <label class="control-label">Hospital</label>
                            <div class="controls">
                                <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                                       name="hospital_id" />
                                <span class="input-xxlarge uneditable-input">
                                    <?= $this->params['hospital']->getNombre() ?>
                                </span>
                            </div>
                        </div>
                      
                      
						<div class="control-group">
                        <div class="controls">
                          
                          <button type="button" class="btn sbmttest">Guardar</button>
                        </div>
                      </div>
                  </fieldset></form>
                
                
                
                
            </div>
            <div class="tab-pane" id="settings">
                <h2>Variables de funcionamiento</h2>
                
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
                      
						<div class="control-group">
                            <label class="control-label">Hospital</label>
                            <div class="controls">
                                <input type="hidden" value="<?= $this->params['hospital']->getHospitalId() ?>" 
                                       name="hospital_id" />
                                <span class="input-xxlarge uneditable-input">
                                    <?= $this->params['hospital']->getNombre() ?>
                                </span>
                            </div>
                        </div>
                      
                          
                          
                          <div class="control-group">
                        <div class="controls">
                          
                          <button type="button" class="btn sbmttest">Guardar</button>
                        </div>
                      </div>
                  </fieldset></form>
                
            </div>
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

<?php
/*
  $this->loadContentView("default");
  $this->getContentView();
 */
?>
<link href="template/css/jqui/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">

<style>
    .preloaderContainer {
        width: 200px;
        height: 200px;
        background: url(template/img/loadingbg.png) no-repeat center center;
        position: absolute;

    }

    .preloaderBox {
        width: 200px;
        height: 200px;
        background: url(template/img/loading.gif) no-repeat center center;
    }
    .ui-datepicker {
        font-size: 12px;
    }

</style>

<script>
    $(function() {
        $("#myModal").modal("hide");
        
        $("#sbmt").click(function() {
            //var values = $("form#infoBasica").serialize();

            $.ajax({
                url: '?v=medicionesblh&action=submitBasicInfo',
                type: 'POST',
                data: values,
                success: function(res) {
                    $("#modalBodyP *").remove();
                    $("#modalBodyP").append(res);
                    $("#myModal").modal("show");
                    $('form#infoBasica input[type="text"]').val("");

                    //alert(res);
                }
            })
        });
        
        $(".sbmttest").click(function() {
            var values = $("form#infoBasica").serialize();

            $.ajax({
                url: '?v=medicionesblh&action=submitBasicInfoTEST',
                type: 'POST',
                data: values,
                success: function(res) {
                    $("#modalBodyP *").remove();
                    $("#modalBodyP").append(res);
                    $("#myModal").modal("show");
                    $('form#infoBasica input[type="text"]').val("");

                    //alert(res);
                }
            })
        });
        
    })
</script>

<script type="text/javascript" src="template/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type = "text/javascript">
    $(function() {

        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
        $("input.datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-m-d"
        });
        $('#myTab a').click(function(e) {
            //e.preventDefault();
            $(this).tab('show');
            return false;
        })






    });
</script>


