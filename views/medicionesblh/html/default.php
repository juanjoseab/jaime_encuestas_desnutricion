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


    <script type="text/javascript" lang="JavaScript">
        $(function() {
            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            })
            $('#myTab a:last').tab('show');
            function showLoader() {

                var ww = $(window).width();
                var wh = $(window).height();

                $('<div class="preloaderContainer"><div class="preloaderBox"></div></div>').appendTo("body");

                $(".preloaderContainer")
                        .css("position", "absolute")
                        .css("left", ((ww / 2) - 100))
                        .css("top", ((wh / 2) - 100) + $(window).scrollTop());

            }

            function hideLoader() {
                $(".preloaderContainer, .preloaderBox").remove();
            }

        });
    </script>

    <div class="span9" id="TopForm">

        <h1>Registro de datos <small>Encuesta a un estandar</small></h1>
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


                <form accept-charset="utf-8" class="form-horizontal" id="infoBasica" method="POST" action="http://localhost/projects/jaime_encuestas_desnutricion?v=medicionblh&action=saveInfoBasica&idh=" >
                    <fieldset>
                        <legend></legend>
                        <div class="control-group">
                            <label class="control-label" >Fecha medicion</label>
                            <div class="controls">
                                <input type="text" class=" signedField notNulleable" maxsize=""  required="required"  placeholder="Fecha Medicion"  id="Fecha Medicion"  name="fecha_medicion" value="" />
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Hospital</label>
                            <div class="controls">

                                <select id="select_Hospital_combo_box" name="hospital_id" >
                                    <option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"<option value=""></option>"
                                </select>

                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Inauguracio</label>
                            <div class="controls">
                                <input type="text" class=" signedField notNulleable" maxsize=""  required="required"  placeholder="Inauguracio"  id="Inauguracio"  name="inauguracio" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Cantidad cunas servicio recien nacido</label>
                            <div class="controls">
                                <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Cantidad Cunas Servicio Recien Nacido"  id="Cantidad Cunas Servicio Recien Nacido"  name="cantidad_cunas_servicio_recien_nacido" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Cantidad camas maternidad</label>
                            <div class="controls">
                                <input type="text" class=" intField signedField notNulleable" maxsize=""  required="required"  placeholder="Cantidad Camas Maternidad"  id="Cantidad Camas Maternidad"  name="cantidad_camas_maternidad" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Nombre coordinadora</label>
                            <div class="controls">
                                <input type="text" class=" stringField signedField notNulleable" maxsize=""  required="required"  placeholder="Nombre Coordinadora"  id="Nombre Coordinadora"  name="nombre_coordinadora" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Profesion cordinadora id</label>
                            <div class="controls">
                                <input type="text" class=" intField unsignedField notNulleable" maxsize="10"  required="required"  placeholder="Profesion Cordinadora Id"  id="Profesion Cordinadora Id"  name="profesion_cordinadora_id" value="" />
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Telefono</label>
                            <div class="controls">
                                <textarea class=" textField signedField Nulleable"  placeholder="Telefono"  id="Telefono"  name="telefono" ></textarea>
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" >Email contacto</label>
                            <div class="controls">
                                <textarea class=" textField signedField Nulleable"  placeholder="Email Contacto"  id="Email Contacto"  name="email_contacto" ></textarea>
                            </div>
                        </div><div class="control-group">
                            <div class="controls">

                                <button type="submit" class="btn">Guardar</button>
                            </div>
                        </div>
                    </fieldset></form>

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
            </div>

            <div class="tab-pane" id="messages">
                <h2>Variables de Calidad</h2>
            </div>
            <div class="tab-pane" id="settings">
                <h2>Variables de funcionamiento</h2>
            </div>
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

</style>