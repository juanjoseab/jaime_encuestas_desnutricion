<?php
if($this->acl->acl("Submision")){


?>


<script type="text/javascript" lang="JavaScript">
    $(function(){
        $("select#select_departamaento_combo_box").change(function(){
            $("select#select_municipio_combo_box option").remove();
            $.ajax({
                url:        '?v=submision&action=returnOptions&referencia=municipios&itemId='+$(this).val(),
                type:       'GET',
                data:       '',
                success:    function(res){
                    $("select#select_municipio_combo_box").append(res);
                }
            });
        })
        
        
        $("select#select_estandar_combo_box").change(function(){
            $("select#select_intrahosp_combo_box option").remove();
            $.ajax({
                url:        '?v=submision&action=returnOptions&referencia=servicios&itemId='+$(this).val(),
                type:       'GET',
                data:       '',
                success:    function(res){
                    $("select#select_intrahosp_combo_box").append(res);
                }
            });
            
            $.ajax({
                url:        '?v=submision&action=returnOptions&referencia=indicadores&itemId='+$(this).val(),
                type:       'GET',
                data:       '',
                success:    function(res){
                    $("div#formIndicadores div").remove();
                    $("div#formIndicadores").append(res);
                }
            });
            
        })
        
        $("form#sendSubmitSubmision").submit(function(){
            var values = $(this).serialize();
            $.ajax({
                url:        '?v=submision&action=doSubmission',
                type:       'POST',
                data:       values,
                success:    function(res){
                    $("div#mensajesDeAlerta .alert").remove();
                    $("div#mensajesDeAlerta").append(res);
                    $('body,html').animate({scrollTop:0},800);
                    return false;
                }
            });
            return false;
        });
        
        
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
    if($alerts){ echo $alerts; }
    ?>
    
    <form  method="post" action="?v=submision&action=doSubmission" accept-charset="utf-8" class="form-horizontal" id="sendSubmitSubmision">
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Nombre del personal:</label>
            <div class="controls">
                <input type="text" class="input-xxlarge" name="nombre_personal" placeholder="Nombre del personal que realizo la encuesta" />
            </div>            
        </div>
        
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Cargo:</label>
            <div class="controls">
                <input type="text" class="input-xxlarge" name="cargo" placeholder="Cargo del personal que realizo la encuesta" />
            </div>            
        </div>
        
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> No. de Historia cl&iacute;nica del paciente:</label>
            <div class="controls">
                <input type="text" class="input-xxlarge" name="historia_clinica" placeholder="No. de Historial clinico del paciente encuestado" />
            </div>            
        </div>
        
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> A&ntilde;o:</label>
            <div class="controls">
                <select class="input-xxlarge" name="anio" placeholder="año de la captura de los datos">
                    <option value="<?=date('Y')-1?>"><?=date('Y')-1?></option>
                    <option selected="selected" value="<?=date('Y')?>"><?=date('Y')?></option>
                    <option value="<?=date('Y')+1?>"><?=date('Y')+1?></option>
                </select>
            </div>            
        </div>
        
        <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Mes:</label>
            <div class="controls">
                <select class="input-xxlarge" name="mes" placeholder="mes de la captura de los datos">
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
            <label class="control-label"><span class="text-warning">*</span> Departamento:</label>
            <div class="controls">
                <select name="departamento_id" class="input-xxlarge" id="select_departamaento_combo_box">
                  <option selected="selected" value="0">Indique un departamento</option>
                        <?

                         $mselect =  new MysqlSelect();
                         $mselect->setTableReference("departamento");
                         $mselect->addFilter("departamento", "estado", 1, "=");


                         if($mselect->execute()){
                            $grid = $mselect->rows;                    
                            foreach($grid AS $r){
                                ?><option value="<?=$r['departamento_id']?>"><?=$r['nombre']?></option><?
                            }

                        }

                         ?>
                </select>
            </div>            
        </div>
        
         <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Municipio:</label>
            <div class="controls">
                <select name="municipio_id" class="input-xxlarge" id="select_municipio_combo_box">
                    <option class="showFristSelect">elija antes un departamento</option>
                   
                </select>
            </div>            
        </div>
        
         <div class="control-group">
            <label class="control-label"><span class="text-warning">*</span> Estandar:</label>
            <div class="controls">
                <select name="estandar_id" class="input-xxlarge" id="select_estandar_combo_box">
                  <option class="input-xxlarge" selected="selected" value="0">Indique un Estandar</option>
                        <?

                         $mselect =  new MysqlSelect();
                         $mselect->setTableReference("estandar");
                         $mselect->addFilter("estandar", "estado", "1", "=");

                         if($mselect->execute()){
                            $grid = $mselect->rows;                    
                            foreach($grid AS $r){
                                ?><option value="<?=$r['estandar_id']?>"><?=$r['nombre']?></option><?
                            }

                        }

                         ?>
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

                        <?

                         $mselect =  new MysqlSelect();
                         $mselect->setTableReference("hospital");


                         if($mselect->execute()){
                            $grid = $mselect->rows;                    
                            foreach($grid AS $r){
                                ?><option value="<?=$r['hospital_id']?>"><?=$r['nombre']?></option><?
                            }

                        }

                         ?>
                </select>
            </div>            
        </div>
        <div id="formIndicadores"></div>
        
    
      
      <br />
      <button type="submit" class="btn">Agregar</button>
    </form>

</div>

<? }else{ ?>
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


