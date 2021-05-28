<?php
session_start();
require_once("envio.php");
require_once("/var/www/html/cloud/pages/scripts/configuration.php");
if (!isset($_REQUEST['email_for'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {

    $email=$_REQUEST['email_for'];
    
    $token=md5($email);
    $random=rand(1,1000);
    $total=$token.$random;
    // echo $total;

    $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
    if (!$conn){
      echo "no se pudo conectar";
      exit;
    }

    $valors = array("=","OR","or","'","-","/","`");
    $sanimail= str_replace($valors, "", $email);

    $res=mysqli_query($conn,"UPDATE usuarios set pass_recov='$total' where email='$sanimail'");
    @enviar_email_recuperacion($email);
    
      
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
            <h3 style="font-weight:bold;"> ¡Solo un paso mas! </h3>
        </div> <br>
        <div style="top:50px; position:relative;"> Te hemos enviado un E-mail. Sigue las instrucciones para recuperar tu contraseña</div>
        <div style="top:50px; position:relative;"> <a style ="color:#fff; transition:1s; text-decoration:none;" href="../index.php"> Volver </a> </div>								
    </div>   
</body>
</html>

<?php } ?>