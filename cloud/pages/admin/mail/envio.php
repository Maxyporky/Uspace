<?php
session_start();
	require_once ("class.phpmailer.php");

	
	$e=0; //error		
	//body del message
    $asunto = $_REQUEST['asunto'];
    
    $missatge = $_REQUEST['message'];	
       //end-bodyy 
	$mail = new PHPMailer(true);
    
		
	try{
        $mail->IsSMTP();
		$mail->Host = '192.168.57.254';
		$mail->Port = 25;//465
		$mail->SMTPAuth = false;
		// $mail->Username = 'proyectouspace@gmail.com';
		// $mail->Password = 'Cesf2012';
		//$mail->SMTPSecure = 'no';//ssl
		$mail->Priority = 1;
//		$mail->From = 'proyectouspace@gmail.com';
		$mail->From = 'adminuspace@uspace';
		$mail->FromName = 'Uspace';
		//$mail->AddReplyTo('attcliente@dominip.com','AttCliente');
		$mail->AddAddress($_REQUEST['correo']);
		//$mail->AddBCC('xavier.navarro@cesf.es');
		$mail->CharSet="UTF-8";
		$mail->IsHTML(true);
		$mail->Subject = $asunto;
		$mail->MsgHTML ($missatge);
		$mail->AltBody = '';
		$mail->Send();
        
		} catch (phpmailerException $e) {
			echo'<script type="text/javascript">
			alert("Alguno de los campos esta mal: ". json_encode($e));
			</script>';
			echo'<script type="text/javascript">
			window.location.href = "http://uspace.ddns.net/cloud/pages/admin/admin.php";
			</script>';
			

	} catch (Exception $e) {
		echo'<script type="text/javascript">
			alert("Alguno de los campos esta mal ". json_encode($e));
			</script>';
		echo'<script type="text/javascript">
        window.location.href = "http://uspace.ddns.net/cloud/pages/admin/admin.php";
        </script>';

	}
	if ($e) return $e->errorMessage();
	else{ 
		 
		echo'<script type="text/javascript">
        window.location.href = "http://uspace.ddns.net/cloud/pages/admin/admin.php";
        </script>'; 
        
        
			$mail->ClearAddresses();
			$mail->ClearCCs();
			$mail->ClearBCCs();
			$mail->ClearAttachments();
			return "ok";
            
		}

        
	
	

	//possar el correu que sigui 
   
?>