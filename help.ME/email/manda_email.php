<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/email/phpmail/PHPMailerAutoload.php';

	function sendEmail($email, $id_email_conf){
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->CharSet = 'UTF-8';
		
		$mail->Username = 'lukvailox@gmail.com';
		$mail->Password = '34960550.';
		$mail->From = 'lukvailox@gmail.com';
		$mail->FromName = 'Help.me';
		$mail->addAddress($email,"Nome do cara");
		$mail->isHTML(true);

		$mail->Subject = 'Valide sua conta';
		$mail->Body    = "<h1>Teste</h1>
						<a href='https://help-me-daw.herokuapp.com/email/verifica_email.php?id_email=$id_email_conf'>Verifique sua conta.</a>";

		//$mail->Body    = file_get_contents(HTMLEMAILPATH);

		$result = $mail->send(); 
		if(!$result)
			return 'Mailer Error: ' . $mail->ErrorInfo . "\n";
		else 
			return 'done';
	}
?>