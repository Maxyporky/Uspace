<?php
session_start();
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

        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/metisMenu.min.css" rel="stylesheet">
        <link href="../../css/timeline.css" rel="stylesheet">
        <link href="../../css/startmin.css" rel="stylesheet">
        <link href="../../css/morris.css" rel="stylesheet">
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/59287b4588.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../../js/scripts.js"> </script>
    </head>
    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">Cloud</a>
                </div>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="https://uspace.ddns.net"><i class="fa fa-home fa-fw"></i>Web</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['user']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li><a href="../config/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
                
          
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        
                            <h1 class="page-header">Configuración</h1>
                        <div class="col-6 col-sm-3">
                        <h3> Cambiar nombre de usuario </h3>
                        <form action="../scripts/chage_name.php" method="post">
                            <input type="text" placeholder="Nombre actual" name="n_act" class="form-control" style="width:300px;" required>
                            <br>
                            <input type="text" placeholder="Nombre nuevo" name="n_new" class="form-control" style="width:300px;" required>
                            <br>
                            <input type="submit" name="change" value="Cambiar" class="btn btn-primary">       
                        </form>    
                        
                        <h3> Cambiar contraseña </h3>
                        <form action="../scripts/chage_passw.php" method="post">
                            <input type="text" placeholder="Contraseña actual" name="p_act" class="form-control" style="width:300px;" required>
                            <br>
                            <input type="text" placeholder="Contraseña nueva" name="p_new" class="form-control" style="width:300px;" required>
                            <br>
                            <input type="submit" name="change" value="Cambiar" class="btn btn-primary">       
                        </form>

                        </div>


                        <div class="col-6 col-sm-3"> 
                        <br>
                        <h3> Elimina tu cuenta </h3>
                        <form action="../scripts/remove_account.php" method="post">
                        <input type="text" placeholder="Escribe tu nombre de usuario para confirmar" name="nameone" class="form-control" style="width:350px;" required>
                        <br>
                        <input type="text" placeholder="Escribe tu nombre de usuario para confirmar" name="nametwo" class="form-control" style="width:350px;" required>
                        <br>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" name="checked">Estoy seguro</label>
                        <br>
                        <br>
                        <input type="submit" name="delete" value="Eliminar cuenta" class="btn btn-danger">
                        </form>
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

        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/metisMenu.min.js"></script>
        <script src="../../js/raphael.min.js"></script>
        <script src="../../js/morris.min.js"></script>
        <script src="../../js/morris-data.js"></script>
        <script src="../../js/startmin.js"></script>

    </body>
</html>
<?php
}
?>