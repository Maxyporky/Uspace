<?php
session_start();
require_once('/var/www/html/cloud/pages/scripts/configuration.php'); 
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
                            <li><a href="../config/profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="../config/config.php"><i class="fa fa-gear fa-fw"></i> Configuración</a>
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
                            <h1 class="page-header">Hola Admin</h1>
                       
                        <div class="col-6 col-sm-3">
                        <h3> Crear usuario </h3>
                        <form action="../scripts/create_user.php" method="post">
                            <input type="text" class="form-control" placeholder="Nombre" name="name" style="width:400px" required>
                            <br>
                            <input type="text" class="form-control"placeholder="Correo electronico" name="email" style="width:400px" required>
                            <br>
                            <input type="text" class="form-control"placeholder="Contraseña" name="pass" style="width:400px" required>
                            <br>
                            <select name="tarifa" class="form-control" style="width:400px" required>
                                <option selected>Escoge la tarifa</option>
                                <option value="1">Casual</option>
                                <option value="2">Avanzado</option>
                                <option value="3">Profesional</option>
                            </select>
                            <br>
                            <button type="submit" name="change"  class="btn btn-primary">Crear</button>      
                        </form>    
                        
                <h3> Eliminar usuario </h3>
                    <form action="../scripts/admin_d_account.php" method="post">
                        <select name="usuario" class="form-control" style="width:300px">
                            <?php 
                             $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
                                if (!$conn){
                                echo "no se pudo conectar";
                                exit;
                                } 
                                $res=mysqli_query($conn,"SELECT user FROM usuarios");
                            
                                while($rowData = mysqli_fetch_array($res)){
                                ?> <option> <?php echo $rowData["user"]; ?> </option> <?php 
                                }
                                ?>
                                <select>
                            <br>
                            <button type="submit" name="change" class="btn btn-danger">Eliminar</button>
                            </form> 
                        </div>
                        
                        <div class="col-6 col-sm-3">
                            <h3 > Enviar correo </h3>
                            <form action="mail/envio.php" method="post">
                                <input type="text" placeholder="Destinatario" name="correo" class="form-control" style="width:300px" required>
                                <br>
                                <input type="text" placeholder="Asunto" name="asunto" class="form-control" style="width:300px" required>
                                <br>
                                <textarea class="form-control" style="width:300px; height:200px;" placeholder="Mensaje" name="message" required></textarea> 
                                <br>
                                <input type="submit" name="change" class="btn btn-primary" value="Enviar" required>       
                            </form> 
                        </div>

                        <div class="col-sm-3" >
                            <h3 > Realizar backup Backup </h3>
                            <form action="../scripts/backup.php">
                            <input type="submit" name="backup" class="btn btn-warning" value="Backup-SQL">
                            <input type="submit" name="backup" class="btn btn-warning" value="Backup-WEB (BETA)">  
                            </form>

                            <div name="archivo"> 
                            
                            <h3 > Backups Disponibles </h3>
                            
                            <br>
                            <form action="../scripts/delete.php" method="post" >
                            <select name="archivo" class="form-control">
                            <?php
                                     $dir = "/etc/backup";
                                        if ($handle = opendir($dir)) {
                                            while (false !== ($entry = readdir($handle))) {
                                                
                                                if ($entry != "." && $entry != ".." && $entry != '.bash_logout' && $entry != '.profile' && $entry != '.bashrc') {
                                                    echo "<option value="."$entry"."> $entry </option>";
                                                }
                                            }
                                            closedir($handle);
                                        }
                                    ?>
                            </select>
                            <br>
                            <button type="submit" name="borrarb" class="btn btn-danger" >Eliminar backup</button>
                            </form> 
                            <br>
                                   
                                    <?php
                                     $dir = "/etc/backup/";
                                     $user = $_SESSION['user'];
                                     
                                        if ($handle = opendir($dir)) {
                                            while (false !== ($entry = readdir($handle))) {
                                                
                                                if ($entry != "." && $entry != ".." && $entry != '.bash_logout' && $entry != '.profile' && $entry != '.bashrc') {
                                                    echo '<br>';
                                                }
                                            }
                                            closedir($handle);
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