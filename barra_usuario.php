<?php 
	
    $sql_nombre = "SELECT nombres FROM datos_personales WHERE num_documento='".$_SESSION["documento"]."'";

	$req_nombre = $bdd->prepare($sql_nombre);
	$req_nombre->execute();

	$nombre = $req_nombre->fetch();
 ?>
<div id='bar'><span id='user'>&nbsp;<b><?php echo $nombre["nombres"] ?>:</b>
            <a href="registro_informacion.php"> Actualizar datos&nbsp;&nbsp;</a>
            <a href="documento.php"> Descargar documento&nbsp;&nbsp;</a>
            <a href="php/cerrar_sesion.php"> Salir</a></h4></span></div>