<?php

function quota(){
    $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
    if (!$conn){
      echo "no se pudo conectar";
      exit;
    } 

    $user=$_SESSION['user'];
   
    $valor=shell_exec("sudo quotausada.sh $user");
    
    $sanivalor = preg_replace("/\s+/", "", $valor);
  

    $progress = ""; 
    
    if ($sanivalor > 0 && $valor < 30){
      $progress="success";
    }
    if ($sanivalor > 30 && $valor < 70){
      $progress="warning";
    }
    if ($sanivalor > 70 && $valor < 100){
      $progress="danger";
    }

   
    $_SESSION['sanivalor']=$sanivalor;
    $_SESSION['progress']=$progress;

   

}
?>
