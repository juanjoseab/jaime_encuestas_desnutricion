<?php
if($_GET){
    MasterController::requerirClase("MysqlSelect");
    $sl = new MysqlSelect();
    switch ($_GET['referencia']){
        case 'municipios':
            if($_GET['itemId']){
                $sl->setTableReference("municipio");
                $sl->addSelection("municipio", "municipio_id");
                $sl->addSelection("municipio", "nombre");                
                $sl->addFilter("municipio", "departamento_id", $_GET['itemId'], "=");
                $sl->addFilter("municipio", "estado", 1, "=");
            if ( $sl->execute() ){
                if (count($sl->rows)){
                    foreach($sl->rows AS $r){
                        echo '<option value="'.$r['municipio_id'].'">'.$r['nombre'].'</option>';
                    }
                }
            }

        }
        
        case 'servicios':
            echo 2;
            if($_GET['itemId']){
                $sl->setTableReference("servicio_intrahospitalario");                
                $sl->addFilter("servicio_intrahospitalario", "estandar_id", $_GET['itemId'], "=");
            if ( $sl->execute() ){
                if (count($sl->rows)){
                    foreach($sl->rows AS $r){
                        echo '<option value="'.$r['servicio_intrahospitalario_id'].'">'.$r['nombre'].'</option>';
                    }
                }
            }

            }
            break;
            
        case 'hospitales':
            echo 2;
            if($_GET['itemId']){
                $sl->setTableReference("hospital");
                $sl->addSelection("hospital", "hospital_id");
                $sl->addSelection("hospital", "nombre");
                $sl->addJoin("municipio", "municipio_id", "=", "hospital", "municipio_id");
                $sl->addJoin("departamento", "departamento_id", "=", "municipio", "departamento_id");
                
                $sl->addFilter("departamento", "departamento_id", $_GET['itemId'], "=");
            if ( $sl->execute() ){
                if (count($sl->rows)){
                    foreach($sl->rows AS $r){
                        echo '<option value="'.$r['departamento_id'].'">'.$r['nombre'].'</option>';
                    }
                }
            }

            }
            break;
        
        case 'indicadores':
            if($_GET['itemId']){
                $sl->setTableReference("indicador");                
                $sl->addFilter("indicador", "estandar_id", $_GET['itemId'], "=");
                
            if ( $sl->execute() ){
                if (count($sl->rows)){
                    $indicador  = array();
                    $flagInd = 0;
                    foreach ($sl->rows as $ind){
                        $indicador[$flagInd]['indicador_id'] = $ind['indicador_id'];
                        $indicador[$flagInd]['nombre'] = $ind['nombre'];
                        $indicador[$flagInd]['descripcion'] = $ind['descripcion'];
                        $indicador[$flagInd]['estandar_id'] = $ind['estandar_id'];
                        
                        //Recuperar posibles valores del indicador
                        $i = new MysqlSelect();
                        $i->setTableReference("valor_indicador");
                        $i->addFilter("valor_indicador", "indicador_id", $ind['indicador_id'], "=");
                        $i->execute();
                        if(count($i->rows)){                            
                            $indicador[$flagInd]['valores']= $i->rows; 
                        }
                        
                        $flagInd ++;
                    }
                    
                    $hexIds = "";
                    foreach ($indicador as $f){
                        $options = "";
                        if(count($f['valores']) > 0){
                            foreach($f['valores'] AS $v){
                                $options .= "<option value=\"{$v[valor_indicador_id]}\">{$v[valor]}</option>";
                            }
                        }
                        ?>
                            <div class="control-group">
                                <label class="control-label"><span class="text-warning">*</span> <?php echo $f['nombre'] ?>:</label>
                                <div class="controls">
                                    <select name="indicador<?=$f['indicador_id']?>">
                                        <?=$options?>
                                    </select>
                                </div>            
                            </div>
                        <?php  
                        
                        $hexIds .= dechex($f['indicador_id'])."578460921";
                        
                       
                        
                    }
                    $hexIds = substr($hexIds, 0,-9);
                     echo "<div><input type=\"hidden\" name=\"indres\" value=\"{$hexIds}\" /></div>";
                    
                    
                    
                    
                        
                    
                    
                }
            }

        }
        break;
        
        
        
        
    }
}
