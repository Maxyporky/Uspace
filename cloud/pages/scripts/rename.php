<?php 
session_start();
if (!isset($_SESSION['logeado'])){
    echo'<script type="text/javascript">
				window.location.href = "../../index.html";
			  </script>';
} else {

if (isset($_POST['renombrar'])){
    
    $oname = $_POST["o_archivo"];
    $nname = $_POST["n_archivo"];
    $user = $_SESSION['user'];
    $dir = "/media/nube/";

    shell_exec("sudo mv ".$dir.$user."/".$oname." ".$dir.$user."/".$nname);
    
    echo "Archivo renombrado";
    echo'<script type="text/javascript">
        window.location.href = "../files.php";
        </script>';
    

}
}

?>