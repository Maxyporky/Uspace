<?php
session_start();
$user=$_SESSION['user'];
$valor=$_REQUEST['quota'];
$_SESSION['mensaje'];


//variable de sesion 
//SET Y UNSET DE LA VARIABLE DE SESION
if ($valor == 1){
 shell_exec("sudo setquota $user 3G 3G 0 0 /media/nube/");
 $_SESSION['mensaje']="Has cambiado la quota";
 echo'<script type="text/javascript">
				window.location.href = "../almacenamiento.php";
			  </script>';
}

if ($valor == 2){
    shell_exec("sudo setquota $user 5G 5G 0 0 /media/nube/");
	$_SESSION['mensaje']="Has cambiado la quota";
    echo'<script type="text/javascript">
				window.location.href = "../almacenamiento.php";
			  </script>';
}

if ($valor == 3){
    shell_exec("sudo setquota $user 10G 10G 0 0 /media/nube/");
	$_SESSION['mensaje']="Has cambiado la quota";
    echo'<script type="text/javascript">
				window.location.href = "../almacenamiento.php";
			  </script>';
}
?>