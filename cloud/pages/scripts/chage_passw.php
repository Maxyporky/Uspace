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
    $p_act = $_POST ['p_act']; 
    $p_new = $_POST ['p_new'];

     

    
    //check if name exists
    $sanipas_act = hash('sha512', $p_act);
    $sanipas_new = hash('sha512', $p_new);

    $res = mysqli_query($conn,"select pass from usuarios where pass = '$sanipas_act'");
    if (mysqli_num_rows($res)>0){
        $query = mysqli_query($conn,"UPDATE usuarios SET pass = '$sanipas_new' WHERE user = '$user'");
        sleep(5);      
        echo'<script type="text/javascript">
				window.location.href = "../config/config.php";
			  </script>';
    }else{
      echo '<script type="text/javascript"> alert("Contraseña No coincide"); </script>';
      echo'<script type="text/javascript">
      window.location.href = "../config/config.php";
      </script>';
      

        
    } 

 }



?>