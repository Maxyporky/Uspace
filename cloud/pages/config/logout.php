<?php 
session_start();
session_destroy(); 
echo'<script type="text/javascript">
window.location.href = "http://uspace.ddns.net/login/";
</script>';
?>

