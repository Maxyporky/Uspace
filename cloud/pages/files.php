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

        <link href="scripts/dropzone/dropzone.css" rel="stylesheet" type="text/css">
        <script src="scripts/dropzone/dropzone.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/metisMenu.min.css" rel="stylesheet">
        <link href="../css/timeline.css" rel="stylesheet">
        <link href="../css/startmin.css" rel="stylesheet">
        <link href="../css/morris.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/59287b4588.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/scripts.js"> </script>

    </head>
    <body>

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Cloud</a>
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
                            <li><a href="config/profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <h1 class="page-header">Gestionar archivos</h1>
                        </div>
                    </div>
                        <div class="" >
                        
                        <div>

                        <table width="100%">
                        <tr>
                            <th style="padding:15px;">  <h3> Eliminar archivos </h3>
                                    <form action="scripts/delete.php" method="post" >
                                    <select name="archivo" class="form-control">
                                    
                                    <?php
                                     $dir = "media/nube";
                                     $user = $_SESSION['user'];
                                     $path="/$dir/$user/";
                                        if ($handle = opendir($path)) {
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
                                    <button type="submit" name="borrar" value="Borrar" class="btn btn-primary">Borrar</button>
                                    </form> 
                            </th>
                            
                            <th style="padding:15px; text-align:center;">
                                   <h3> Renombrar archivo </h3>
                                    <form action="scripts/rename.php" method="post">
                                        <input type="text" placeholder="Archivo a renombrar" name="o_archivo" class="form-control" style="width:200px; display:inline;">
                                        <input type="text" placeholder="Nuevo nombre" name="n_archivo" class="form-control" style="width:200px; display: inline;">
                                        <button type="submit" name="renombrar"  class="btn btn-primary">Renombrar</button>      
                                    </form>
                            </th>
                            <th style="padding:15px; text-align:center;">
                                    <h3> Crear carpeta </h3>
                                        <form action="scripts/mkdir.php" method="post">
                                            <input type="text" placeholder="Nombre carpeta" name="name_dir" class="form-control" style="width:200px; display:inline;">
                                            <button type="submit" name="create"  class="btn btn-primary">Crear</button>      
                                        </form>
                            </th>
                            <th style="padding:15px; text-align:center;">
                                    <h3> Mover archivo </h3>
                                    <form action="scripts/move.php" method="post">
                                        <input type="text" name="source" placeholder="Nombre archivo" class="form-control" style="width:200px; display:inline;"> </input>
                                        <input type="text" name="destination" placeholder="Sitio a mover" class="form-control" style="width:200px; display:inline;"> </input>
                                        <button type="submit" name="move"  class="btn btn-primary">Mover</button>
                                       
                                    </form>    
                            </th>  
                        </tr>
                    </table> 
                       <br>                     
                        <h3> Tus archivos </h3>    
                        <div>
                        <button class="btn btn-primary" onclick="refresh()">Refrescar</button> 
                        </div>
                        <br>
                        <div class="panel panel-primary" id="box">                                                    
                                <?php
                                    $dir = "media/nube";
                                    $user = $_SESSION['user'];
                                    if (!isset($_GET['dir'])) {
                                        $path="/$dir/$user/";
                                        //media/nube/Mari/
                                    }else{
                                        $path=$_GET['dir']."/";

                                    }

                                    $resource = opendir($path);
                                    while (($entry = readdir($resource)) !== FALSE) {
                                        if ($entry != '.' && $entry != '..' && $entry != '.bash_logout' && $entry != '.profile' && $entry != '.bashrc'){
                                            //      
                                            if (is_dir($path.$entry)){
                                                ?>
                                                <div style=" font-size: 18px; margin-left: 5px">
                                                <?php
                                                echo "<A href='files.php?dir=$path$entry'><i style=\"color:#a3a3a3\" class='fas fa-folder'></i></A>"." ".$entry."<br/>"; 
                                                ?>
                                                </div>
                                                <?php                                       
                                            }
                                            
                                            else{
                                                ?>
                                                <div style=" font-size: 18px; margin-left: 5px">
                                                <?php
                                                 echo "<A href='scripts/download.php?file=$path$entry'><i class='fas fa-file'></i></A>"." ".$entry."<br/>";
                                                ?>
                                                </div>
                                           
                                                <?php
                                            }                                          
                                        }                                       
                                    }
                                                $back="";
                                                $carpetas=explode("/",$path); 
                                                for ($i=0; $i < count($carpetas)-2; $i++) { 
                                                    $back= $back.$carpetas[$i];
                                                    if ($i<count($carpetas)-3) $back.="/"; // noponemos / en el ultim dir                                                      
                                                }
                                                
                                                if ($path != "/media/nube/$user/") {
                                                ?>
                                                <div style=" font-size: 18px; margin-left: 5px">
                                                <?php
                                                echo "<A href='files.php?dir=$back'><i class='fas fa-backward'></i>"." "."</A>Back<br/>";
                                                ?>
                                                </div>
                                                <?php    
                                            }
                                            
                                ?>
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

     
        <form action="scripts/upload.php" class="dropzone" id="dropzonewidget" style="margin-bottom:30px;">
            <img id="imagen" src="../img/upload.gif" class="responsive">
        </form> 
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