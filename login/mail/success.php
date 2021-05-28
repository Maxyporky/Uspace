<?php
session_start();
require_once("envio.php");
if (!isset($_SESSION['email'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {

    $email =$_SESSION['email'];
    @enviar_email_contacto($email);

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
        <div style="top:50px; position:relative;"> Te hemos enviado un E-mail. Sigue las instrucciones para activar tu cuenta</div>
        <div style="top:50px; position:relative;"> <a style ="color:#fff; transition:1s; text-decoration:none;" href="../index.php"> Volver </a> </div>								
    </div>   
</body>
</html>

<?php } ?>