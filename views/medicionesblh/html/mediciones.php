<?php
if ($this->acl->acl("Submision")) {
    MasterController::requerirModelo("hospital");
    $hospital = new hospital();
    $hospitales = $hospital->getList(Array(), array());
    ?>




    <div class="span9" id="TopForm">

        <h1>Información básica <small>para bancos de leche humana</small></h1>
        <p>
            Seleccione el hospital.
        </p>
        <div id="mensajesDeAlerta"></div>
        <?php
        $alerts = $this->activesMsgs();
        if ($alerts) {
            echo $alerts;
        }
        ?>

    </div>



    <div class="span4">
        <br />
        <br />
        <br />
        <select size="20" name="hospital_id"  id="hospitalCombo" style="width: 375px;">

            <?php
            foreach ($hospitales AS $h) {
                ?> <option value="<?= $h['hospital_id'] ?>"><?= $h['nombre'] ?></option> <?php
            }
            ?>
        </select>    

    </div>
    <div class="span5" id="formLoaderBox">


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

    #formLoaderBox {
        min-height: 300px;
    }

    #formLoaderBox.loading {
        background: url(template/img/loading.gif) no-repeat center center;
    }

</style>
<script type="text/javascript" src="template/js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
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

        function bind_datepicker_to_date_fields()
        {
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $("input.datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-m-d",
                yearRange: '-125:+0'
            });
        }




        var xhl = false;
        $("#hospitalCombo").change(function() {
            if (xhl) {
                xhl.abort();
            }

            $("#formLoaderBox *").remove();
            $("#formLoaderBox").addClass("loading");
            var hospitalID = $(this).val();
            xhl = $.ajax({
                url: '?v=medicionesblh&action=viewMedicionesForms&idh=' + hospitalID,
                type: 'GET',
                data: "",
                success: function(res) {

                    $("#formLoaderBox").removeClass("loading");
                    $("#formLoaderBox").append(res);
                    bind_datepicker_to_date_fields();
                    bindTabs();
                    bindAjaxDates();
                    numericOnly();
                }
            })
        });


        $("#myModal").modal("hide");
        $("body").on("click", "#sbmt", function() {
            var values = $("form#infoBasica").serialize();
            $.ajax({
                url: '?v=medicionesblh&action=submitBasicInfo',
                type: 'POST',
                data: values,
                success: function(res) {
                    $("#modalBodyP *").remove();
                    $("#modalBodyP").append(res);
                    $("#myModal").modal("show");
                    //$('form#infoBasica input[type="text"]').val("");

                    //alert(res);
                }
            })
        });


        $("body").on("click", "#sbmtProd", function() {
            var values = $("form#infoProduccion").serialize();
            
            $.ajax({
                url: '?v=medicionesblh&action=submitProduccion',
                type: 'POST',
                data: values,
                success: function(res) {
                    $("#modalBodyP *").remove();
                    $("#modalBodyP").append(res);
                    $("#myModal").modal("show");
                    $('form#infoProduccion input[type="text"]').val("");
                    $('form#infoProduccion .text-info strong').text("");

                    //alert(res);
                }
            })
        });
        
        
        $("body").on("click", "#sbmtCalidad", function() {
            var values = $("form#infoCalidad").serialize();
            
            $.ajax({
                url: '?v=medicionesblh&action=submitCalidad',
                type: 'POST',
                data: values,
                success: function(res) {
                    $("#modalBodyP *").remove();
                    $("#modalBodyP").append(res);
                    $("#myModal").modal("show");
                    $('form#infoCalidad input[type="text"]').val("");
                    $('form#infoCalidad .text-info strong').text("");

                    //alert(res);
                }
            })
        });
        
        
        $("body").on("click", "#sbmtFuncMensual", function() {
            var values = $("form#infoFuncionamientoMensual").serialize();
            
            $.ajax({
                url: '?v=medicionesblh&action=submitFuncionamientoMensual',
                type: 'POST',
                data: values,
                success: function(res) {
                    $("#modalBodyP *").remove();
                    $("#modalBodyP").append(res);
                    $("#myModal").modal("show");
                    $('form#infoFuncionamientoMensual input[type="text"]').val("");
                    //$('form#infoFuncionamientoMensual .text-info strong').text("");

                    //alert(res);
                }
            })
        });
        
        $("body").on("click", "#sbmtFuncAnual", function() {
            var values = $("form#infoFuncionamientoAnual").serialize();
            
            $.ajax({
                url: '?v=medicionesblh&action=submitFuncionamientoAnual',
                type: 'POST',
                data: values,
                success: function(res) {
                    $("#modalBodyP *").remove();
                    $("#modalBodyP").append(res);
                    $("#myModal").modal("show");
                    $('form#infoFuncionamientoAnual input[type="text"]').val("");
                }
            })
        });
        


        function bindTabs() {
            $('#myTab a').click(function(e) {
                //e.preventDefault();
                $(this).tab('show');
                return false;
            })
        }

        function bindAjaxDates() {
            $('select.bindAnio').change(function() {
                 $("#" + $(this).attr('rel') + "-mes option").remove();
                if(!$(this).val()){                   
                    return false;
                }
                var thisSelect = $(this);
                var monthSelectTag = $("#" + $(this).attr('rel') + "-mes");
                var uri = "?v=medicionesblh&action=getAvailableMonths&idh=" +
                        thisSelect.attr("relhid") + "&anio=" +
                        thisSelect.val() + "&medicion=" + thisSelect.attr("rel");
                //alert (uri);
                $.ajax({
                    type: "GET",
                    url: uri,
                    data: "",
                    success: function(res) {
                        monthSelectTag.append(res);
                        //console.log(res);
                    }
                });
            });

            function converToMonthName(monthNumber) {
                var Months = new Array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
                return Months[monthNumber];
            }
        }


        $("body").on("blur", "#LitrosLecheRecolectada, #LitrosLecheDistribuida", function() {
            var llr = $("#LitrosLecheRecolectada").val();
            var lld = $("#LitrosLecheDistribuida").val();
            if (
                    (llr && lld)
                    &&
                    (!isNaN(llr) && llr > 0)
                    &&
                    (!isNaN(lld) && lld > 0)
                    ) {
                var result = ((lld / llr) * 100);
                $("#usolecherecolectada").val(result.toFixed(2));
                $("#usolecherecolectadaLabel strong").text(result.toFixed(2) + "%");
            }
        });

        $("body").on("blur", "#RnTratadosLecheHumana, #RnAtendidosUcipNeumoRn", function() {
            var num = $("#RnTratadosLecheHumana").val();
            var den = $("#RnAtendidosUcipNeumoRn").val();
            if (
                    (num && den)
                    &&
                    (!isNaN(num) && num > 0)
                    &&
                    (!isNaN(den) && den > 0)
                    ) {
                var result = ((num / den) * 100);
                $("#coberturaatencion").val(result.toFixed(2));
                $("#coberturaatencionLabel strong").text(result.toFixed(2) + "%");
            }
        });
        
        
        $("body").on("blur", "#litros_leche_recolectada_intrahospitalaria, #litros_leche_recolectada_extrahospitalaria", function() {
            var num = $("#litros_leche_recolectada_intrahospitalaria").val();
            var den = $("#litros_leche_recolectada_extrahospitalaria").val();
            if (
                    (num || den)
                    &&
                    (!isNaN(num) && num > 0)
                    ||
                    (!isNaN(den) && den > 0)
                    ) {
                var result = (num * 1) + (den * 1);
                $("#LitrosLecheRecolectada").val(result);
                $("#LitrosLecheRecolectadaLabel strong").text(result);
            }
        });
        
        
        $("body").on("blur", "#CantidadMadresDonadorasInternas, #CantidadMadresDonadorasExternas", function() {
            var num = $("#CantidadMadresDonadorasInternas").val();
            var den = $("#CantidadMadresDonadorasExternas").val();
            if (
                    (num || den)
                    &&
                    (!isNaN(num) && num > 0)
                    ||
                    (!isNaN(den) && den > 0)
                    ) {
                var result = (num * 1) + (den * 1);
                $("#CantidadMadresDonadoras").val(result);
                $("#CantidadMadresDonadorasLabel strong").text(result);
                var dd = $("#CantidadPartosAtendidos").val();
                if(dd && !isNaN(dd) && dd > 0 ){                    
                    var result2 = (result / dd) * 100
                    $("#captaciondonadoras").val(result2.toFixed(2));
                    $("#captaciondonadorasLabel strong").text(result2.toFixed(2) + "%");
                }
                
            }
        });

        $("body").on("blur", "#CantidadMadresDonadoras, #CantidadPartosAtendidos", function() {
            var num = $("#CantidadMadresDonadoras").val();
            var den = $("#CantidadPartosAtendidos").val();
            if (
                    (num && den)
                    &&
                    (!isNaN(num) && num > 0)
                    &&
                    (!isNaN(den) && den > 0)
                    ) {
                var result = ((num / den) * 100);
                $("#captaciondonadoras").val(result.toFixed(2));
                $("#captaciondonadorasLabel strong").text(result.toFixed(2) + "%");
            }
        });
        
        
        $("body").on("keyup", "#CantidadAceptableAcidezDormic, #CantidadNoAceptableAcidezDormic", function() {
            var llr = $("#CantidadNoAceptableAcidezDormic").val();
            var lld = $("#CantidadAceptableAcidezDormic").val();
            
            if (
                    (llr || lld)
                    &&
                        (
                            (!isNaN(llr) && llr > 0)
                            ||
                            (!isNaN(lld) && lld > 0)
                        )                    
                    ) {
                
                var res = (llr * 1) + (lld * 1);
                $("#TotalAcidezDormic").val(res);
                $("#TotalAcidezDormicLabel strong").text(res);
            }
            
            
            if (
                    (llr && lld)
                    &&
                    (!isNaN(llr) && llr > 0)
                    &&
                    (!isNaN(lld) && lld > 0)
                    ) {
                var denominador = parseFloat(llr) + parseFloat(lld);
                var result = ((lld / denominador) * 100);
                $("#ConformidadAcidezDormic").val(result.toFixed(2));
                $("#ConformidadAcidezDormicLabel strong").text(result.toFixed(2) + "%");
            }
        });
        
        
        $("body").on("keyup", "#CantidadAceptableCrematocrito, #CantidadNoAceptableCrematocrito", function() {
            var llr = $("#CantidadNoAceptableCrematocrito").val();
            var lld = $("#CantidadAceptableCrematocrito").val();
            
            if (
                    (llr || lld)
                    &&
                        (
                            (!isNaN(llr) && llr > 0)
                            ||
                            (!isNaN(lld) && lld > 0)
                        )                    
                    ) {
                
                var res = (llr * 1) + (lld * 1);
                $("#TotalCrematocrito").val(res);
                $("#TotalCrematocritoLabel strong").text(res);
            }
            
            
            
            if (
                    (llr && lld)
                    &&
                    (!isNaN(llr) && llr > 0)
                    &&
                    (!isNaN(lld) && lld > 0)
                    ) {
                var denominador = parseFloat(llr) + parseFloat(lld);
                var result = ((lld / denominador) * 100);
                $("#ConformidadCrematocrito").val(result.toFixed(2));
                $("#ConformidadCrematocritoLabel strong").text(result.toFixed(2) + "%");
            }
        });
        
        
        $("body").on("keyup", "#CantidadAceptableColiformes, #CantidadNoAceptableColiformes", function() {
            var llr = $("#CantidadNoAceptableColiformes").val();
            var lld = $("#CantidadAceptableColiformes").val();
            
            if (
                    (llr || lld)
                    &&
                        (
                            (!isNaN(llr) && llr > 0)
                            ||
                            (!isNaN(lld) && lld > 0)
                        )                    
                    ) {
                
                var res = (llr * 1) + (lld * 1);
                $("#TotalColiformes").val(res);
                $("#TotalColiformesLabel strong").text(res);
            }
            
            
            
            if (
                    (llr && lld)
                    &&
                    (!isNaN(llr) && llr > 0)
                    &&
                    (!isNaN(lld) && lld > 0)
                    ) {
                var denominador = parseFloat(llr) + parseFloat(lld);
                var result = ((lld / denominador) * 100);
                $("#ConformidadColiformes").val(result.toFixed(2));
                $("#ConformidadColiformesLabel strong").text(result.toFixed(2) + "%");
            }
        });
        
        

        function numericOnly() {
            jQuery('.numericfield').keyup(function() {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            });
        }

    })
</script>



