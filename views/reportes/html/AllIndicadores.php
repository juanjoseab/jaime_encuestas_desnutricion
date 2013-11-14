<script type="text/javascript" language="JavaScript">
    
    $(function(){
        $("#nuevoReporteForm").hide();
        $("a#linkVerNuevoReporte").click(function(){
            $("#nuevoReporteForm").slideToggle();
        });
        $("select#select_departamaento_combo_box").change(function(){
            $("select#select_municipio_combo_box option").remove();
            $.ajax({
                url:        '?v=reportes&action=returnOptions&referencia=municipios&itemId='+$(this).val(),
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
                url:        '?v=reportes&action=returnOptions&referencia=servicios&itemId='+$(this).val(),
                type:       'GET',
                data:       '',
                success:    function(res){
                    $("select#select_intrahosp_combo_box").append(res);
                }
            });
            
            $.ajax({
                url:        '?v=reportes&action=returnOptions&referencia=indicadores&itemId='+$(this).val(),
                type:       'GET',
                data:       '',
                success:    function(res){
                    $("select#select_indicador_combo_box option").remove();
                    $("select#select_indicador_combo_box").append(res);
                }
            });            
        })
    })
        
</script>
    

<?php
//año
//mes inicio y fin
// estandar
// indicador
// servicio intrahosp
// hosp
MasterController::requerirModelo("estandar");
MasterController::requerirModelo("indicador");
MasterController::requerirModelo("servicio_intrahospitalario");
MasterController::requerirModelo("hospital");
$tx = new ClassTransaction();
$estandar = new estandar();
$indicador = new indicador();
$servh = new servicio_intrahospitalario();
$hospital = new hospital();

$estandar->estandar_id = $_POST['estandar_id'];
$tx->loadClass($estandar);
$si = $tx->returnObjectValues();
$estandar->nombre['val'] = $si['nombre'];


$indicador->indicador_id['val'] = $_POST['indicador_id'];
$indicador->nombre['val'] = "todos los indicadores del estandar";

if($_POST['servicio_intrahospitalario_id']!='todos' && is_numeric($_POST['servicio_intrahospitalario_id']) ){
    $servh->servicio_intrahospitalario_id = $_POST['servicio_intrahospitalario_id'];
    $tx->loadClass($servh);
    $si = $tx->returnObjectValues();
    $servh->nombre['val'] = $si['nombre'];
    
}else{
    $servh->nombre['val'] = "Todos los servicios intrahospitalarios";
    
}

if($_POST['hospital_id']!='todos' && is_numeric($_POST['hospital_id']) ){
	
	MasterController::requerirModelo("hospital");
    $hospital = new hospital();
    $hospital->hospital_id['val'] = $_POST['hospital_id'];
    $trx = new ClassTransaction();
    $trx->loadClass($hospital);
    $hvalues = $trx->returnObjectValues();
    
    $hospital->nombre['val'] = htmlspecialchars($hvalues['nombre']); 
    $hospital->hospital_id['val'] = $hvalues['hospital_id'];

    
}else{
    $hospital->nombre['val'] = "Todos los hospitales";
}

?>
<div style="span10">
            

			
			<h1>Generaci&oacute;n de Reporte <small> [<?=$this->covertirAMes($_POST['mes-inicio']).", ".$_POST['anio-inicio']?>] - [<?=$this->covertirAMes($_POST['mes-fin']).", ".$_POST['anio-fin']?>] </small></h1>
            <div id="nuevoReporte" style="border: 1px solid #ccc; border-radius:4px; padding: 10px;">
                <a href="#" id="linkVerNuevoReporte">Nuevo reporte</a>
                <div id="nuevoReporteForm" style="display: none;">
                    <h3><small>Nuevo reporte</small></h3>
                <p>
                    Llene los campos que aparecen abajo para construir su reporte
                </p>
                <div id="mensajesDeAlerta"></div>
                <?php
                $alerts = $this->activesMsgs();
                if($alerts){ echo $alerts; }
                ?>

                <form  method="post" action="?v=reportes&action=visualizar" accept-charset="utf-8" class="form-horizontal" id="sendSubmitSubmision">
                    <div class="control-group">
                        <label class="control-label"><span class="text-warning">*</span> Inicio:</label>
                        <div class="controls">
                            <select class="input-large" name="anio-inicio" placeholder="año de la captura de los datos">
                                <?php 
									if( is_array( $this->data["anios"]) ) {
										foreach($this->data["anios"] AS $year){
								?>
								
								<option value="<?=$year['anio']?>"><?=$year['anio']?></option>
                                <?php
										}
									}
								?>
                            </select>
							
							<select class="input-large" name="mes-inicio" placeholder="mes de la captura de los datos">
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
                        <label class="control-label"><span class="text-warning">*</span> Final:</label>
                        <div class="controls">
                            <select class="input-large" name="anio-fin" placeholder="año de la captura de los datos">
                                <?php 
									if( is_array( $this->data["anios"]) ) {
										foreach($this->data["anios"] AS $year){
								?>
								
								<option value="<?=$year['anio']?>"><?=$year['anio']?></option>
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
                  <button type="submit" class="btn">Ver reporte</button>
                </form>
                </div>
            </div>
            <div>
                <dl class="dl-horizontal">
                    <dt>Estandar aplicado</dt>
                    <dd><?=$estandar->nombre['val']?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Indicador</dt>
                    <dd><?=$indicador->nombre['val']?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Hospital</dt>
                    <dd><?=$hospital->nombre['val']?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Servicio Intra-Hospitalario</dt>
                    <dd><?=$servh->nombre['val']?></dd>
                </dl>
            </div>


            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">
              google.load("visualization", "1", {packages:["corechart"]});
              google.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  <?php echo $this->grid; ?>
                

                ]);

                var options = {
                  title: 'Reporte de consolidado de datos del estandar',
                  hAxis: {title: 'cantidades',  titleTextStyle: {color: 'Blue'}}
                };

                
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);

                
              }

            </script>



            <div id="chart_div" style="width: 1200px; height: 600px;"></div>
            
            <div style="span9">
                <h3>Fuente de datos</h3>
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>No.</th>                        
                            <th>indicador</th>
                            <th>total si (cant - %)</th>
                            <th>total no (cant - %)</th>
                            <th>Totales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $c=0;
                            $tSi=0; 
                            $tNo=0;
                            foreach($this->sqlRows AS $r){
                                $tSi+=$r['Si'];
                                $tNo+=$r['No'];
								
								if( (($r['Si']+$r['No'] ) > 0) ){
									$porcentajeSi = round(($r['Si']*100)/($r['Si']+$r['No']),2);
									$porcentajeNo = round(($r['No']*100)/($r['Si']+$r['No']),2);
								}else{
									$porcentajeSi = 0.00;
									$porcentajeNo = 0.00;
								}
                                //$porcentajeSi = @round(($r['Si']*100)/($r['Si']+$r['No']),2);
								//$porcentajeNo = @round(($r['No']*100)/($r['Si']+$r['No']),2);
                                
                                
                            ?>
                            <tr>
                                <td rowspan="2"><?=++$c?></td><td rowspan="2"><?=$r['indicador']?>  </td><td><?=$r['Si']?></td><td><?=$r['No']?></td><td><?=$r['No']+$r['Si']?></td>
                            </tr>
                            <tr>
                                <td><?=$porcentajeSi?>%</td><td> <?=$porcentajeNo?>%</td><td>100%</td>
                            </tr>
                            <?php
                        }?>
                            
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><b>Totales</b></td><td><b><?=$tSi?></b></td><td><b><?=$tNo?></b></td><td><b><?=$tSi+$tNo?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Porcentajes (%)</b></td><td><b><?= round(( ($tSi*100)/($tSi+$tNo)),2 )?>%</b></td><td><b><?=round(( ($tNo*100)/($tSi+$tNo)),2)?>%</b></td><td><b><?php echo "100%";?></b></td>
                        </tr>
                    </tfoot>
                    </table>
            </div>
        
        



</div>
