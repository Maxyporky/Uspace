<?php
	session_start();
	require_once('config.php');

	
		if (isset($_REQUEST['entrar'])) {

			$conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
			if (!$conn){
			  echo "no se pudo conectar";
			  exit;
			} 
			
			$usu= $_REQUEST['nombre'];
			$pas= $_REQUEST['pass'];
		

			//sanitize user
			$valors = array("=","OR","or","'","-","/","`","UNION","union");
			$saniuser= str_replace($valors, "", $usu);

			//sanitize password
			$sanipas=str_replace($valors, "", $pas);
			$sanipas = hash('sha512', $pas);

			$res = mysqli_query($conn,"SELECT * FROM usuarios WHERE user ='".$saniuser."' and pass='".$sanipas."' and email_ck='1'") or die(mysqli_error());
			
			if (mysqli_num_rows($res)>0){

				$_SESSION['logeado']="SI";
				$_SESSION['user']=$usu;
				
				echo'<script type="text/javascript">
				window.location.href = "http://uspace.ddns.net/cloud/pages/index.php";
			  </script>';

					
			}else{
				echo '
				<div class="text-center">
					<div style="top:50px; position:relative;"> 
						<h3 style="font-weight:bold;"> ¡Ups! Parace que tienes los siguientes errores: </h3>
					</div> <br>
					<div style="top:50px; position:relative;"> Usuario o contraseña incorrectos </div>
					<div style="top:50px; position:relative;"> <a style ="color:#fff; transition:1s; text-decoration:none;" href="index.php"> Volver </a> </div>								
				</div>';
	
			} 
						 
		 
	}
?>

<html>
    <head>
		<meta charset="utf-8" >
		<link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
		<link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
	
	<body id="background">
	<?php
	if(!isset( $_REQUEST ["entrar"] )) {

	?>

        <form class="form" action="index.php" method="post">
            <a style="color:#fff;" >Inicia sesión</a>
			<input type="text" name="nombre" placeholder="Usuario"class="imputs" required>
			<input type="password" name="pass" placeholder="Contraseña" class="imputs" required>
			<button type="submit" name="entrar" class="login-button" value="Entrar"> Log-In </button>
            <a id="dos" href="register.php">¿No tienes cuenta? Pulsa aquí</a>
			<a id="dos" href="recover.html">Recuperar contraseña</a>
            <a id="dos" href="../index.html">Menú principal</a>
		</form>

	<?php } ?>  

    </body>
</html>
