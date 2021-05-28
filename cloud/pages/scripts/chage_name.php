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

    $user = $_SESSION['user'];
    $n_act = $_POST ['n_act']; 
    $n_new = $_POST ['n_new'];

    //check if name exists
    if ($n_act != $_SESSION['user']){
      echo '<script type="text/javascript"> alert("Nombre de usuario no coincide con el tuyo"); </script>';
        echo'<script type="text/javascript">
				window.location.href = "../config/config.php";
			  </script>';
        exit;
    }

    $res = mysqli_query($conn,"select user from usuarios where user = '$n_act'");
    
    if (mysqli_num_rows($res)>0){
        shell_exec("sudo usermod -l $n_new $n_act");
        shell_exec("sudo mv /media/nube/$n_act /media/nube/$n_new");
        shell_exec("sudo usermod -d /media/nube/$n_new $n_new");
        

        $query = mysqli_query($conn,"UPDATE usuarios SET user = '$n_new' WHERE user = '$n_act'");
        $_SESSION['user']=$n_new;
        sleep(5);      
        echo'<script type="text/javascript">
				window.location.href = "../config/config.php";
			  </script>';
    }

 }

?>