<?php
session_start();
if (!isset($_SESSION['logeado'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {

if (isset($_POST['create'])){
    $user = $_SESSION['user'];
    $name = $_POST["name_dir"];
    $dir = "/media/nube/";
    


   shell_exec("sudo mkdir ".$dir.$user."/".$name);
   shell_exec("sudo chown ".$user.":".$user." ".$dir.$user."/".$name);
     
    echo'<script type="text/javascript">
        window.location.href = "../files.php";
        </script>';
     
  }
}

?>