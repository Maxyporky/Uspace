
<?php
session_start();
$var=$_GET['token'];
$correo=$_GET['correo'];
$_SESSION['correo']=$correo;

require_once("config.php");


$conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
    if (!$conn){
      echo "no se pudo conectar";
      exit;
    }

    $res=mysqli_query($conn,"SELECT * FROM usuarios WHERE pass_recov='$var'");

    if (mysqli_num_rows ($res)>0){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" href="css/login.css">
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <title>Page Title</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel="stylesheet" href="../css/login.css">
            <link href="css/bootstrap.min.css" rel="stylesheet">
        </head>
            <body id="background">
                <div class="text-center">
                    <form class="form" action="changer.php" method="post">
                        <a style="color:#fff; display:inline;">Introduce contraseña nueva</a> <br>
                        <input type="password" name="pass_one" style="margin-top: 30px; width: 400px;" class="imputs" placeholder="Contraseña" required>
                        <input type="password" name="pass_two" style="margin-top: 30px; width: 400px;" class="imputs" placeholder="Contraseña" required>
                        <button type="submit" name="cambiar" class="login-button" value="Entrar"> Cambiar </button>
                    
                    </form>
            </body>
            </html>
      <?php

        }
    else {
        echo'<script type="text/javascript">
        window.location.href = "../index.html";
      </script>'; 
    }



?>




