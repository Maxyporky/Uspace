<?php
session_start();
if (!isset($_SESSION['logeado'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {

if (isset($_POST['borrar'])){
    $name = $_POST["archivo"];
    $user = $_SESSION['user'];
    $dir = "/media/nube/";
  
    shell_exec("sudo rm -r ".$dir.$user."/".$name);

    echo'<script type="text/javascript">
        window.location.href = "../files.php";
        </script>';
    }

    if (isset($_POST['borrarb'])){
      $name = $_POST["archivo"];
      $user = $_SESSION['user'];
      $dir = "/etc/backup/";
    
      shell_exec("sudo rm -r ".$dir."/".$name);
  
      echo'<script type="text/javascript">
          window.location.href = "../admin/admin.php";
          </script>';
      }
  }

