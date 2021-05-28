<?php
require_once("scripts/configuration.php");
require("/var/www/html/cloud/pages/scripts/chkadmin.php");
session_start();
if (!isset($_SESSION['logeado'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Uspace cloud</title>

       
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/metisMenu.min.css" rel="stylesheet">
        <link href="../css/timeline.css" rel="stylesheet">
        <link href="../css/startmin.css" rel="stylesheet">
        <link href="../css/morris.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/59287b4588.js" crossorigin="anonymous"></script>

    </head>
    <body>
          <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Cloud</a>
                </div>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="https://uspace.ddns.net"><i class="fa fa-home fa-fw"></i> Web</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li -n">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['user']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="config/profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="config/config.php"><i class="fa fa-gear fa-fw"></i>Configuración</a>
                            </li>
                            <?php
                                admin();
                            ?>
                            <li class="divider"></li>
                            <li><a href="config/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
                
          
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Bienvenido <?php echo $_SESSION['user'];?>!</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6" >
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-file-image fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div id="title">Administrar archivos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="files.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver detalles</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-cloud-upload-alt fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div id="title">Subir archivos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="subida.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver detalles</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-hdd fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right ">
                                            <div id="title">Comprobar almacenamiento</div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <a href="almacenamiento.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver detalles</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
  

    
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>

<?php
}
?>
