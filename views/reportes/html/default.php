<script type="text/javascript" lang="JavaScript">
    $(function() {
        $("select#select_departamaento_combo_box").change(function() {
            $("select#select_municipio_combo_box option").remove();
            $.ajax({
                url: '?v=reportes&action=returnOptions&referencia=municipios&itemId=' + $(this).val(),
                type: 'GET',
                data: '',
                success: function(res) {
                    $("select#select_municipio_combo_box").append(res);
                }
            });
        })


        $("select#select_estandar_combo_box").change(function() {
            $("select#select_intrahosp_combo_box option").remove();
            $.ajax({
                url: '?v=reportes&action=returnOptions&referencia=servicios&itemId=' + $(this).val(),
                type: 'GET',
                data: '',
                success: function(res) {
                    $("select#select_intrahosp_combo_box").append(res);
                }
            });

            $.ajax({
                url: '?v=reportes&action=returnOptions&referencia=indicadores&itemId=' + $(this).val(),
                type: 'GET',
                data: '',
                success: function(res) {
                    $("select#select_indicador_combo_box option").remove();
                    $("select#select_indicador_combo_box").append(res);
                }
            });
        })


    });
</script>




<div class="span9">

    <h1>Reportes</h1>
    <p>
        Llene los campos que aparecen abajo para construir su reporte
    </p>
    <div id="mensajesDeAlerta"></div>
    <?php
    $alerts = $this->activesMsgs();
    if ($alerts) {
        echo $alerts;
    }
    ?>

    <form  method="post" action="?v=reportes&action=visualizar" accept-charset="utf-8" class="form-horizontal" id="sendSubmitSubmision">
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Inicio:</label>
            <div class="controls">
                <select class="input-xxlarge" name="date-init" placeholder="fecha de asignación para la captura de los datos" id="asignacionFecha">
                    <?php
                    MasterController::requerirModelo('fecha');
                    $insertDate = new fecha();
                    $fechasActivas = $insertDate->getList(array("fecha_id", "mes", "anio"), array());
                    if (count($fechasActivas) > 0) {
                        foreach ($fechasActivas AS $fi) {
                            ?>
                            <option value="<?= $fi['fecha_id'] ?>"><?= $this->covertirAMes($fi['mes']) . ", " . $fi['anio'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="control-group"> 
            <label class="control-label"><span class="text-warning">*</span> Fin:</label>
            <div class="controls">
                <select class="input-xxlarge" name="date-end" placeholder="fecha de asignación para la captura de los datos" id="asignacionFecha">
                    <?php
                    //$fechasActivas = $insertDate->getList(array("fecha_id", "mes", "anio"), array("estado" => array("1", "=")));
                    if (count($fechasActivas) > 0) {
                        foreach ($fechasActivas AS $fi) {
                            ?>
                            <option value="<?= $fi['fecha_id'] ?>"><?= $this->covertirAMes($fi['mes']) . ", " . $fi['anio'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>            
        </div>

        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Final:</label>
            <div class="controls">
                <select class="input-large" name="anio-fin" placeholder="año de la captura de los datos">
                    <?php
                    if (is_array($this->data["anios"])) {
                        foreach ($this->data["anios"] AS $year) {
                            ?>

                            <option value="<?= $year['anio'] ?>"><?= $year['anio'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

                <select class="input-large" name="mes-fin" placeholder="mes de la captura de los datos">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>                    
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Estandar:</label>
            <div class="controls">
                <select name="estandar_id" class="input-xxlarge" id="select_estandar_combo_box">
                    <option class="input-xxlarge" selected="selected" value="0">Indique un Estandar</option>
                    <?
                    $mselect = new MysqlSelect();
                    $mselect->setTableReference("estandar");
                    $mselect->addFilter("estandar", "estado", "1", "=");

                    if ($mselect->execute()) {
                        $grid = $mselect->rows;
                        foreach ($grid AS $r) {
                            ?><option value="<?= $r['estandar_id'] ?>"><?= $r['nombre'] ?></option><?
                        }
                    }
                    ?>
                </select>
            </div>            
        </div>
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Indicador:</label>
            <div class="controls">
                <select name="indicador_id" class="input-xxlarge" id="select_indicador_combo_box">
                    <option class="input-xxlarge" selected="selected" value="0">Indique un Estandar</option>                        
                </select>
            </div>            
        </div>
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Servicio Intra-Hospitalario:</label>
            <div class="controls">
                <select class="input-xxlarge" name="servicio_intrahospitalario_id" id="select_intrahosp_combo_box">
                    <option class="showFristSelect" value="0">elija antes un estandar</option>

                </select>
            </div>            
        </div>

        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Hospital:</label>
            <div class="controls">
                <select class="input-xxlarge" name="hospital_id" id="select_hospital_combo_box">
                    <option selected="selected" value="todos">Todos los hospitales</option>
                    <?
                    $mselect = new MysqlSelect();
                    $mselect->setTableReference("hospital");


                    if ($mselect->execute()) {
                        $grid = $mselect->rows;
                        foreach ($grid AS $r) {
                            ?><option value="<?= $r['hospital_id'] ?>"><?= $r['nombre'] ?></option><?
                        }
                    }
                    ?>
                </select>
            </div>            
        </div>
        <div id="formIndicadores"></div>



        <br />
        <button type="submit" class="btn">Ver reporte</button>
    </form>

</div>