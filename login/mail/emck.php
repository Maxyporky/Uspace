<?php
session_start();
require_once("../config.php");
if (!isset($_SESSION['email'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {
    $user=$_SESSION['user'];
    $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
    if (!$conn){
      echo "no se pudo conectar";
      exit;
    }
    
    $res=mysqli_query($conn,"SELECT tarifa FROM usuarios WHERE user='$user'");

    while($rowData = mysqli_fetch_array($res)){
      $tarifa=$rowData["tarifa"];
    }

    shell_exec("sudo /var/www/html/login/alta.sh $user $tarifa");

    
    $resdu=mysqli_query($conn,"SELECT email_ck FROM usuarios WHERE user='$user'");
    
    while($rowData = mysqli_fetch_array($resdu)){
        $email=$rowData["email_ck"];
      }
         
    if ($email == 1){
        echo "Cuenta ya verificada";
    } else {
      $res=mysqli_query($conn,"UPDATE usuarios set email_ck='1' where user='$user'");
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../css/login.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="background">
    <div class="text-center">
        <div style="top:50px; position:relative;"> 
            <h3 style="font-weight:bold;"> ¡Cuenta confirmada! </h3>
        </div> <br>
        <div style="top:50px; position:relative;"> Tu cuenta ha sido activada, ya puedes usar Uspace</div>
        <div style="top:50px; position:relative;"> <a style ="color:#fff; transition:1s; text-decoration:none;" href="../index.php"> Ir al cloud </a> </div>								
    </div>   
</body>
</html>

<?php }  ?>