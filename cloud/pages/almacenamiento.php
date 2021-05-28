<?php
session_start();
require_once('/var/www/html/cloud/pages/scripts/configuration.php');
require('/var/www/html/cloud/pages/scripts/quota.php');
require("/var/www/html/cloud/pages/scripts/chkadmin.php");

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
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Cloud</a>
                </div>
                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Web</a></li>
                </ul>
                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['user']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="config/profile.php"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                            </li>
                            <li><a href="config/config.php"><i class="fa fa-gear fa-fw"></i> Configuración</a>
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
                            <h1 class="page-header">Gestionar almacenamiento</h1>
                        </div>                     
        
                        <?php        
            quota();
            $valor=$_SESSION['sanivalor'];
           $progress=$_SESSION['progress'];
        ?>
        
        <h3 style="margin-top:50px;"> Espacio utilizado </h3>
        <div class="progress" style="width:50%; background-color:#bdbdbd;">
        <div class="progress-bar progress-bar-<?php echo "$progress"; ?> progress-bar-striped active" role="progressbar"
        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="<?php echo "width:$valor%;"; ?> ">
            <?php echo "$valor"."% de espacio utilizado";  ?>
        </div>
        </div>  
        
        <h4> ¿Estas pensado en ampliar tu tarifa? </h4>
        <form action="scripts/chgquota.php" method="post" name="quota">
        <select name="quota" class="form-control" style="width:200px; margin-bottom:10px;"> 
        <option  value="1"> Casual
        <option  value="2"> Avanzado
        <option  value="3"> Profesional       
        </select>

        <input type="submit" name="change" value="Compra más espacio" class="btn btn-info" > 
        <?php
           if (isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
           }
            
        ?>
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
        <script src="../js/startmin.js"></script>

    </body>
</html>

<?php
}
?>