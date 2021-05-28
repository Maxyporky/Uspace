<?php
session_start();
require_once('../scripts/configuration.php');

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
    
    $name = $_POST ['name']; 
    $email = $_POST ['email'];
    $pass = $_POST ['pass'];
    $tarifa = $_POST['tarifa'];
   

    //check if name exists
    $res = mysqli_query($conn,"select user from usuarios where user = '$name'");
    if (mysqli_num_rows($res)>0){
        echo '<script type="text/javascript"> alert("Usuario existente"); </script>';
        echo'<script type="text/javascript">
				window.location.href = "../admin/admin.php";
			  </script>';
        
    }else{        
        if ($name || $pass || $email || $tarifa == null){
        echo '<script type="text/javascript"> alert("Usuario no creado"); </script>';
        echo'<script type="text/javascript">
				window.location.href = "../admin/admin.php";
			  </script>';
        exit;
        }

        mysqli_query($conn,"INSERT INTO usuarios (user,pass,email,tarifa,email_ck) VALUES('$name','$pass','$email','$tarifa','1')");
        
        while($rowData = mysqli_fetch_array($res)){
          $tarifa=$rowData["tarifa"];
        }

        shell_exec("sudo /var/www/html/login/alta.sh $name $tarifa");

        sleep(5);      
        echo'<script type="text/javascript">
				window.location.href = "../admin/admin.php";
			  </script>';
        
    } 

 }

?>