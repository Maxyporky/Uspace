<?php
require_once("configuration.php");
function admin(){

    $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
			if (!$conn){
			  echo "no se pudo conectar";
			  exit;
			}
        
        $user = $_SESSION['user'];
        $res = mysqli_query($conn,"SELECT id FROM usuarios WHERE user ='".$user."'") or die(mysqli_error());

        while($rowData = mysqli_fetch_array($res)){
            $state=$rowData["id"];
        }

        if ($state >= 1 && $state <= 10 ){?>
          <li><a href="admin/admin.php"><i class="fas fa-toolbox"></i> Panel admin</a></li>
          <?php } } ?>