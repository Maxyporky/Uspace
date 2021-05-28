<?php
session_start();
require_once('configuration.php');

if (!isset($_SESSION['logeado'])){
    echo'<script type="text/javascript">
				window.location.href = "../../../index.html";
			  </script>';
}

if (isset($_POST['delete'])){
	
	$nameone = $_REQUEST['nameone'];
	$nametwo = $_REQUEST['nametwo'];
	
                        
    if ($nameone && $nametwo != $_SESSION['user']){
        echo '<script type="text/javascript"> alert("Nombre de usuario no coincide"); </script>';
        echo'<script type="text/javascript">
				window.location.href = "../config/config.php";
			  </script>';
        exit;
        }

	$conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
				if (!$conn){
				echo "no se pudo conectar";
				exit;
				} 

	$user = $_SESSION['user'];
	shell_exec("sudo userdel $user"); 
	shell_exec("sudo rm -r /media/nube/$user");
	$res = mysqli_query($conn,"delete from usuarios where user = '$user'") or die(mysqli_error());

	sleep(5);
	echo'<script type="text/javascript">
					window.location.href = "../../../index.html";
		</script>';
}
?>