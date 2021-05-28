<?php
session_start();
require_once('configuration.php');

if (!isset($_SESSION['logeado'])){
    echo'<script type="text/javascript">
				window.location.href = "../../../index.html";
			  </script>';
}

$conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
			if (!$conn){
			  echo "no se pudo conectar";
			  exit;
			} 

	if (isset($_POST['change'])){

		$name=$_POST['usuario'];
		shell_exec("sudo userdel $name");
		shell_exec("sudo rm -r /media/nube/$name");
		$res = mysqli_query($conn,"delete from usuarios where user = '$name';") or die(mysqli_error());

		sleep(3);
		echo'<script type="text/javascript">
						window.location.href = "../admin/admin.php";
			</script>';
	
	}

?>