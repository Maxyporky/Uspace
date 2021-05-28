<?php

function enviar_email_contacto ($to)
{
	require_once ("class.phpmailer.php");
	$e=0; //error		
	//body del message
    $asunto = "Confirmación de cuenta";
    
    $missatge = "<table class=\"body-wrap\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;\" bgcolor=\"#f6f6f6\">
    <tbody>
        <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
            <td style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;\" valign=\"top\"></td>
            <td class=\"container\" width=\"600\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;\" valign=\"top\">
                <div class=\"content\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;\">
                    <table class=\"main\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" itemprop=\"action\" itemscope=\"\" itemtype=\"http://schema.org/ConfirmAction\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;\">
                        <tbody><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                            <td class=\"content-wrap\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #015090;border-radius: 7px; background-color: #fff;\" valign=\"top\">
                                <meta itemprop=\"name\" content=\"Confirm Email\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                    <tbody><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 20px; vertical-align: top; margin: 0; padding: 0 0 20px; font-weight: bold;\" valign=\"top\">
                                            ¡Bienvenido!
                                        </td>
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
                                            Estamos impacientes de mostrarte todo lo que Uspace puede ofrecerte. Pero antes de nada pulsa en el boton para confirmar tu dirección de correo electronico
                                       </td> 
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" itemprop=\"handler\" itemscope=\"\" itemtype=\"http://schema.org/HttpActionHandler\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
                                            <a href=\"https://uspace.ddns.net/login/mail/emck.php\" class=\"btn-primary\" itemprop=\"url\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f7c004; margin: 0; border-color: #f7c004; border-style: solid; border-width: 8px 16px;\">Confirmar direccion E-mail</a>
                                        </td>
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
                                            <b>Uspace</b>
                                            <p>Equipo de soporte</p>
                                            <img src=\"../../assets/images/logo.png\">
                                        </td>
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"text-align: center;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;\" valign=\"top\">
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </td>
        </tr>
    </tbody>
</table>


<style>
    body{margin-top:20px;}
</style>";
		
		
       //end-bodyy 
	$mail = new PHPMailer(true);
    
		
	try{
        $mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;//465
		$mail->SMTPAuth = true;
		$mail->Username = 'proyectouspace@gmail.com';
		$mail->Password = 'Cesf2012';
		$mail->SMTPSecure = 'tls';//ssl
		$mail->Priority = 1;
		$mail->From = 'proyectouspace@gmail.com';
		$mail->FromName = 'Uspace';
		//$mail->AddReplyTo('attcliente@dominip.com','AttCliente');
		$mail->AddAddress($to);
		//$mail->AddBCC('xavier.navarro@cesf.es');
		$mail->CharSet="UTF-8";
		$mail->IsHTML(true);
		$mail->Subject = $asunto;
		$mail->MsgHTML ($missatge);
		$mail->AltBody = '';
		$mail->Send();
        
		} catch (phpmailerException $e) {
		  //echo $e->errorMessage(); //Pretty error messages from PHPMailer

	} catch (Exception $e) {
		  //echo $e->getMessage(); //Boring error messages from anything else!

	}
	if ($e) return $e->errorMessage();
	else{
			$mail->ClearAddresses();
			$mail->ClearCCs();
			$mail->ClearBCCs();
			$mail->ClearAttachments();
			return "ok";
		}
}

function enviar_email_recuperacion ($to)
{
	require_once ("class.phpmailer.php");
    require_once("../config.php");

    $conn = mysqli_connect (HOST,USUARI,PASSUSUARI,BASE); 
    if (!$conn){
      echo "no se pudo conectar";
      exit;
    } 
    $res=mysqli_query($conn,"SELECT pass_recov FROM usuarios WHERE email='$to'");

    while($rowData = mysqli_fetch_array($res)){
        $valor=$rowData["pass_recov"];
      }
      //valor son los valores aleatorios
      $valors = array("=","OR","or","'","-","/","`");
      $sanicode= str_replace($valors, "", $valor);
      $sanimail= str_replace($valors, "", $to);
      

	$e=0; //error		
    $asunto = "Confirmación de cuenta";
    
	$missatge= "<table class=\"body-wrap\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;\" bgcolor=\"#f6f6f6\">
    <tbody>
        <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
            <td style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;\" valign=\"top\"></td>
            <td class=\"container\" width=\"600\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;\" valign=\"top\">
                <div class=\"content\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;\">
                    <table class=\"main\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" itemprop=\"action\" itemscope=\"\" itemtype=\"http://schema.org/ConfirmAction\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;\">
                        <tbody><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                            <td class=\"content-wrap\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #015090;border-radius: 7px; background-color: #fff;\" valign=\"top\">
                                <meta itemprop=\"name\" content=\"Confirm Email\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                    <tbody><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 20px; vertical-align: top; margin: 0; padding: 0 0 20px; font-weight: bold;\" valign=\"top\">
                                            ¡Hola!
                                        </td>
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
                                            Si estás reciviendo este correo significa que has solicitado un cambio de contraseña. De lo contrario ponte en contacto con el soporte de Uspace y recibirás mas información
                                       </td> 
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" itemprop=\"handler\" itemscope=\"\" itemtype=\"http://schema.org/HttpActionHandler\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
                                            <a href='https://uspace.ddns.net/login/pass_chg.php?token=".$sanicode."&correo=".$sanimail."' class=\"btn-primary\" itemprop=\"url\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #000; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f7c004; margin: 0; border-color: #f7c004; border-style: solid; border-width: 8px 16px;\">Cambiar contraseña</a>
											<a href='https://uspace.ddns.net/contacto/' class=\"btn-primary\" itemprop=\"url\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #000; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f7c004; margin: 0; border-color: #f7c004; border-style: solid; border-width: 8px 16px;\">Soporte Uspace</a>
										</td>
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
                                            <b>Uspace</b>
                                            <p>Equipo de soporte</p>
                                            <img src=\"../../assets/images/logo.png\">
                                        </td>
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"text-align: center;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;\" valign=\"top\">
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </td>
        </tr>
    </tbody>
</table>


<style>
    body{margin-top:20px;}
</style>";	
		
       //end-bodyy 
	$mail = new PHPMailer(true);
    
		
	try{
        $mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;//465
		$mail->SMTPAuth = true;
		$mail->Username = 'proyectouspace@gmail.com';
		$mail->Password = 'Cesf2012';
		$mail->SMTPSecure = 'tls';//ssl
		$mail->Priority = 1;
		$mail->From = 'proyectouspace@gmail.com';
		$mail->FromName = 'Uspace';
		//$mail->AddReplyTo('attcliente@dominip.com','AttCliente');
		$mail->AddAddress($to);
		//$mail->AddBCC('xavier.navarro@cesf.es');
		$mail->CharSet="UTF-8";
		$mail->IsHTML(true);
		$mail->Subject = $asunto;
		$mail->MsgHTML ($missatge);
		$mail->AltBody = '';
		$mail->Send();
        
		} catch (phpmailerException $e) {
		  //echo $e->errorMessage(); //Pretty error messages from PHPMailer

	} catch (Exception $e) {
		  //echo $e->getMessage(); //Boring error messages from anything else!

	}
	if ($e) return $e->errorMessage();
	else{
			$mail->ClearAddresses();
			$mail->ClearCCs();
			$mail->ClearBCCs();
			$mail->ClearAttachments();
			return "ok";
		}
}
	
	

	//possar el correu que sigui 

?>