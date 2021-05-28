<?php
session_start();
$user=$_SESSION['user'];
$target_dir = "/media/nube/$user/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);


if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $status = 1;
    shell_exec("sudo chown ".$user.":".$user." ".$target_dir.$_FILES["file"]["name"]);
}


#shell_exec("sudo chown ".$user.":".$user." ".$dir.$user."/".$name);
#sudo chown Mariona:Mariona /media/nube/Mariona/correo.html
