<?php
    $to="proyectouspace@gmail.com";

    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $phone = $_REQUEST['phone'];
    $mail = $_REQUEST['mail'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
	require_once ("class.phpmailer.php");
    
        $e=0; //error		
	
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
                                            Datos de cliente
                                        </td>
                                    </tr>
                                    <tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\">
                                        <td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
                                            $name <br>
                                            $surname <br>
                                            $phone <br>
                                            $mail <br> <br>
                                            
                                            $subject <br>
                                            $message<br>
                                       </td> 
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
        echo'<script type="text/javascript">
				window.location.href = "../success.html";
			  </script>';
			$mail->ClearAddresses();
			$mail->ClearCCs();
			$mail->ClearBCCs();
			$mail->ClearAttachments();
			return "ok";
    
		}
    

	

        
	
	

	//possar el correu que sigui 

?>