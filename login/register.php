<?php
   session_start();
   require_once('config.php');

	if (isset($_REQUEST['register'])) {

    $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
    if (!$conn){
      echo "no se pudo conectar";
      exit;
    } 

          $usuario= $_REQUEST['usu_for'];
          $contrsenya= $_REQUEST['pass_for'];
          $email= $_REQUEST['email_for'];
          $tarifa = $_POST['tarifa'];

          $valors = array("=","OR","or","'","-","/","`");
			    $saniuser= str_replace($valors, "", $usuario);
          $sanimail= str_replace($valors, "", $email);
          // $sanipass = str_replace($valors,"",$contrsenya);
          $cyperpass = hash('sha512', $contrsenya);

          
	
	// $sql="select * from usuarios where user='$saniuser'";
  $chkuser=mysqli_query($conn,"SELECT * FROM usuarios WHERE user='$saniuser'");
  $chkmail=mysqli_query($conn,"SELECT * FROM usuarios WHERE email='$sanimail'");
  // SELECT * FROM `usuarios` WHERE user='test' and email='rostided@gmail.com'
  //SELECT * FROM `usuarios` WHERE user="test" and email="rostided@gmail.com"
  
  if (mysqli_num_rows ($chkuser)>0){
    echo '<script type="text/javascript"> alert("Usuario ya existente"); </script>';
    echo'<script type="text/javascript">
				window.location.href = "register.php";
			  </script>';
  }
 
  if (mysqli_num_rows ($chkmail)>0){
    echo '<script type="text/javascript"> alert("Correo ya existente"); </script>';
    echo'<script type="text/javascript">
				window.location.href = "register.php";
			  </script>';
  }

   else { 

      if ($contrsenya == strlen($contrsenya) < 8){
        echo'<script type="text/javascript">
        alert("La contraseña debe tener 8 caracteres mínimo");
        window.location.href = "https://uspace.ddns.net/login/register.php";
        </script>';
        exit;
      }

      if ($tarifa == "false"){
        echo'<script type="text/javascript">
        alert("Falta tarifa");
        window.location.href = "https://uspace.ddns.net/login/register.php";
        </script>';
        exit;
      }
        // creacion de usuario
          $sql="insert into usuarios (user,pass,email,tarifa) values('$saniuser','$cyperpass','$sanimail','$tarifa')";
        //seleciona tarifa
          // $res=mysqli_query($conn,"SELECT tarifa FROM usuarios WHERE user='$usuario'");

          // while($rowData = mysqli_fetch_array($res)){
          //   $tarifa=$rowData["tarifa"];
          // }
        
          // shell_exec("sudo ./alta.sh $usuario $tarifa");
         
          $consulta=mysqli_query($conn,$sql);
         if($consulta){
       
              $_SESSION['email']=$email;
              $_SESSION['user']=$usuario;
              
              echo'<script type="text/javascript">
            window.location.href = "mail/success.php";
            </script>';
          
                }
              } 
                       		
	} else { ?>
 <html>
   <body id="background">  
    <head>
      
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/login.css">
      
    </head>  
      <form class="form" action="register.php" method="post">
        <a>Registrate hoy</a>
          <input type="text" class="imputs" placeholder="Nombre" name="usu_for" required>
          <input type="email" class="imputs" placeholder="Correo electrónico" name="email_for" required>
          <input type="password" class="imputs" placeholder="Contraseña" name="pass_for" required>
          
          
          <select name="tarifa" class="tarifa" required>
            <option selected value="false">Escoge la tarifa</option>
            <option value="1">Casual</option>
            <option value="2">Avanzado</option>
            <option value="3">Profesional</option>
          </select>

          <button type="submit" class="login-button" name="register">Registrarse</button>
        <a id="dos" href="index.php">¿Ya tienes una cuenta? Pulsa aquí</a>
        <a id="dos" href="../index.html">Menú principal</a>
     </form>   

	<?php } ?>
