<?php 
session_start();
if (!isset($_SESSION['logeado'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {

if (isset($_POST['move'])){
    
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $user = $_SESSION['user'];
    $dir = "/media/nube/";
    //media/nube/   user/ 
    shell_exec("sudo mv ".$dir.$user."/".$source." ".$dir.$user."/".$destination);
  
     echo'<script type="text/javascript">
        window.location.href = "../files.php";
        </script>';
    

}
}

?>