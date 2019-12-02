<?php
	
	//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'mail.sindicatodeciudadanosdelatierra.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "contact@sindicatodeciudadanosdelatierra.com";
		//Password to use for SMTP authentication
		$mail->Password = "iFsdc$#23234$%";
		//Set who the message is to be sent from
		$mail->setFrom('info@sindicatodeciudadanosdelatierra.com', 'Sindicato de ciudadanos de la tierra');
		//Set an alternative reply-to address
		$mail->addReplyTo('info@sindicatodeciudadanosdelatierra.com', 'Sindicato de ciudadanos de la tierra');
		//Set who the message is to be sent to
		$mail->addAddress($_POST["email"], 'usuario');
		//Set the subject line
		$mail->Subject = 'Registro en sindicato de ciudadanos de la tierra';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->Body    = '<br><br>Bienvenido se ha registrado exitosamente en el sindicato de ciudadanos de la tierra, puede ingresar al sistema y descargar su documento de identidad mundial con las siguientes credenciales:<br><br> usuario: '.$_POST["email"].'<br> clave: '.$_POST["clave"].'<br>';
		$mail->AltBody = 'probandosss';
		$mail->CharSet = 'UTF-8';

		//Attach an image file
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "<script>alert('Se registro correctamente');window.location='../form_login.php';</script>";
		} else {
		    echo "<script>alert('Se ha registrado correctamente, le enviamos un correo con sus datos para ingresar, revisar en Spam o en la carpeta de correo no deseado en caso de que no le llegue el correo a la bandeja de entrada');window.location='../form_login.php';</script>";
		}
?>
