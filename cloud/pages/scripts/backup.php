<?php

$name = date("m.d.y");
//backup DB
shell_exec("sudo sh -c 'sudo  mysqldump uspacedb > /etc/backup/$name".".sql'");
//backup web
// shell_exec("sudo backup.sh");

//upload file gdrive
//exec("gupload /etc/backup/$name".".sql")

echo'<script type="text/javascript">
        window.location.href = "../admin/admin.php";
        </script>';

?>