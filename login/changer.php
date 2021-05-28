<?php
session_start();
require_once("config.php");

if(isset($_REQUEST['cambiar'])){
    $correo=$_SESSION['correo'];
    
   
    $one=$_REQUEST['pass_one'];
    $two=$_REQUEST['pass_two'];

    $valors = array("=","OR","or","'","-","/","`","UNION","union");
	$sanipass1= str_replace($valors, "", $one);
    $sanipass2= str_replace($valors, "", $two);

    if($sanipass1 != $sanipass2){
        echo '<script> alert("Las contraseñas no coinciden"); </script>';
        echo '<script>  window.location.href = "../index.html"; </script>'; 
        
    } else{
        $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
			if (!$conn){
			  echo "no se pudo conectar";
			  exit;
			} 

            $pass = hash('sha512', $sanipass1);
            $res = mysqli_query($conn,"UPDATE usuarios set pass='$pass' where email='$correo'");
            echo '<script> alert("Contraseña cambiada"); </script>'; 
            echo '<script>  window.location.href = "../index.html"; </script>'; 

        }
    }



?>