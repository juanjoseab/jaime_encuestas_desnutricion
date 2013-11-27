
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php echo SITE_TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo SITE_DESC; ?>">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="template/css/bootstrap.css" rel="stylesheet">
        <link href="template/css/bootstrap-responsive.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>


        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="template/js/html5.js"></script>
        <![endif]-->

        <script src="template/js/jquery.js"></script>
        <script src="template/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="template/js/loadingImg.js"></script>


        <script type="text/javascript" lang="JavaScript">
            $(function() {
                $("a.needAlertConfirm").click(function() {
                    if (confirm("Realmente desea " + $(this).text() + " este apartado")) {
                        return true;
                    } else {
                        return false;
                    }
                })
            });
        </script>

    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><?= SITE_NAME; ?></a>
                    <div class="nav-collapse collapse">
                        <?php if (isset($_SESSION['user_session']) && $_SESSION['user_session'] == 'ok') { ?>
                            <p class="navbar-text pull-right">
                                Registrado como: <a href="#" class="navbar-link"><?php echo $_SESSION['user_nombre']; ?> </a> | <a href="?v=login&action=logout" class="label label-important">Cerrar Sesi&oacute;n</a>
                            </p>
                        <?php } ?>

                        <ul class="nav">
                            <?php
                            echo $this->mainMenu;
                            ?>



                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <?= $this->sideMenu; ?>
                <div class="span9">

                    <?= $this->getContentView() ?>



                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; Ministerio de Salud P&uacute;blica y Asistencia Social <?= date('Y') ?> </p>

                <center>
                    <img src="template/ops.jpg" border="0" /> 
                    <img src="template/fiodm.jpg" border="0" /> 
                    <img src="template/mspas.jpg" border="0" />

                </center>
            </footer>

        </div><!--/.fluid-container-->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        
    </body>
</html>
