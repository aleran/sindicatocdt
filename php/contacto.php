<?php
//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['enviar'])){
	//Guardamos en variables los datos enviados
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	
	///Validamos del lado del servidor que el nombre y el email no estén vacios
	if($nombre == ''){
		echo "Debe ingresar su nombre";
	}
	else if($email == ''){
		echo "Debe ingresar su email";
}else{
	$para = "contact@sindicatodeciudadanosdelatierra.com";//Email al que se enviará
	$asunto = $_POST['asunto'];//Puedes cambiar el asunto del mensaje desde aqui
	//Este sería el cuerpo del mensaje
	$mensaje = "
		<table border='0' cellspacing='3' cellpadding='2'>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre y Apellido:</strong></td>
			<td width='80%' align='left'>$nombre</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
			<td align='left'>$email</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Cuerpo del Mensaje:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
	</table>	
";	
	
//Cabeceras del correo
    $headers = "From: $nombre <mjs@sindicatodeciudadanosdelatierra.com>\r\n"; //Quien envia?
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; //
	
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	if(mail($para, $asunto, $mensaje, $headers)){
		echo "<script>alert('Mensaje enviado correctamente, Gracias por contactarnos');window.location='../index.php'</script>";
	}else{
		echo "<script>alert('Hubo un error en el envío inténtelo más tarde');window.location='../index.php'</script>";
	}
}
}	
?>