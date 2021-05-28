<?php
require("../scripts/configuration.php");
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

        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/metisMenu.min.css" rel="stylesheet">
        <link href="../../css/timeline.css" rel="stylesheet">
        <link href="../../css/startmin.css" rel="stylesheet">
        <link href="../../css/morris.css" rel="stylesheet">
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/profile.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/59287b4588.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../../js/scripts.js"> </script>

    </head>
    <body>
    <?php 

        $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
            if (!$conn){
            echo "no se pudo conectar";
            exit;
        }
        $user = $_SESSION['user']; 
        $res = mysqli_query($conn,"SELECT email FROM usuarios WHERE user ='$user'") or die(mysqli_error()); 
        $resdos = mysqli_query($conn,"SELECT tarifa FROM usuarios WHERE user ='$user'") or die(mysqli_error()); 
    ?>
        <div id="wrapper">
            <!-- Navigation -->
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
                            <li><a href="config.php"><i class="fa fa-gear fa-fw"></i> Configuración</a>
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
                        <div class="col-lg-12">
                      
                    <h1> Informacion sobre el usuario </h1>
                    <br>
                    <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre de usuario</label>
                      <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $user;?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input class="form-control" id="disabledInput" type="password" placeholder="<?php while($rowData = mysqli_fetch_array($res)){echo $rowData["email"];}?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tipo de tarifa</label>
                      <input class="form-control" id="disabledInput" type="text" placeholder="<?php while($rowData = mysqli_fetch_array($resdos)){
                    $tarifa=$rowData["tarifa"];} if ($tarifa==1) {echo "Casual";} if ($tarifa==2){ echo "Avanzado";} if ($tarifa==3){ echo "Profesional";} ?>" disabled>
                    </div>
                  </form>
                    
                



                 
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