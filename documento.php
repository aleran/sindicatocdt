<?php session_start();
require_once('conexion/conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


	<!-- CSS
	================================================== -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="css/colorbox.css">
	<title>Documento de identidad mundial</title>
	<style>
		body{
			font-size: 11px;
		}

		.rectangulo {
		     width: 450px; 
		     height: 610px;
		     border: 1.5px dashed #555;
		     padding: 11px;
		    
		}

		.rectangulo2 {
		     width: 80px; 
		     height: 50px;
		     border: 1px solid #555;
		     padding: 6px;
		     display: inline-block;
		    
		}
	</style>
</head>
<body>
	<?php 

		$sql_datos = "SELECT * FROM datos_personales p JOIN datos_complem c ON p.num_documento=c.num_documento WHERE c.num_documento='".$_SESSION["documento"]."'";

          $req_datos = $bdd->prepare($sql_datos);
          $req_datos->execute();

          $datos = $req_datos->fetch();

          $sql_pais = "SELECT pais FROM paises WHERE id='".$datos["pais"]."'";

          $req_pais = $bdd->prepare($sql_pais);
          $req_pais->execute();

          $pais = $req_pais->fetch();

          $sql_sangre = "SELECT grupo_s FROM grupos_s WHERE id='".$datos["tipo_sangre"]."'";

          $req_sangre = $bdd->prepare($sql_sangre);
          $req_sangre->execute();

          $sangre = $req_sangre->fetch();

          $sql_documento = "SELECT tipo_doc FROM tipos_docs WHERE id='".$datos["tipo_documento"]."'";

          $req_documento = $bdd->prepare($sql_documento);
          $req_documento->execute();

          $documento = $req_documento->fetch();

          $sql_paisr = "SELECT pais FROM paises WHERE id='".$datos["pais_recidencia"]."'";

          $req_paisr = $bdd->prepare($sql_paisr);
          $req_paisr->execute();

          $paisr = $req_paisr->fetch();

	 ?>
	 <center>	<h1>LA TIERRA FEDEREAL</h1><br>	
	 	<p>	Documento de Identidad mundial con el cual te puedes movilizar y residenciar donde quieras,
con él te identificas en todos los Estados de nuestro mundo.</p>
	<p>	Recorte y plastifique</p>
</center>


	 <div class="col-sm-7 col-sm-offset-4">
	<div class="rectangulo" >
		<center><b>LA TIERRA FEDERAL</b></center>
		Documento de identidad mundial No: <?php echo $_SESSION["documento"] ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="fotos/<?php echo $datos["foto"]  ?>" alt="" width="100" height="100" class="pull-right"><br>
		<span>Apelllidos: <?php echo $datos["apellidos"]; ?></span> <br>
		Nombres: <?php echo $datos["nombres"]; ?> <br>
		Sexo: <?php if ($datos["servicio_militar"]==1) {
			echo "M";
		}else{
			echo "F";
		} ?> <br>

		Lugar y fecha de nacimiento: <?php echo $datos["ciudad"]; ?>, <?php  echo $pais["pais"] ?>,  <?php  echo $datos["fecha_nacimiento"] ?><br>
		Estatura: <?php echo $datos["estatura"]; ?> Color de piel: <?php echo $datos["color_piel"]; ?> <br>
		**Huellas de la mano derecha:<br>
		<div class="rectangulo2">Meñique</div> <div class="rectangulo2">Anular</div> <div class="rectangulo2">Corazón</div> <div class="rectangulo2">Indice</div> <div class="rectangulo2">Pulgar</div><br>
		***Si no tiene las manos, ingrese su foto de cuerpo entero. <br>
		Firma: ___________________________________________<br>
		---------------------------------------------------------------------------------------------------------------------<br>
		Información complementaria del ciudadano<br>
		Grupo sanguineo: <?php echo $sangre["grupo_s"]; ?> <br>
		Profesión: <?php echo $datos["profesion"]; ?>,  <?php echo $datos["universidad"]; ?> <?php echo $datos["fecha_grado"]; ?> <br>
		Servicio Miliar: <?php if ($datos["servicio_militar"]==1) {
			echo "SI";
		}else{
			echo "NO";
		} ?> <br>
		<?php echo $documento["tipo_doc"]; ?>: <?php echo $datos["documento_o"]; ?><br>
		Pase de conducir: <?php echo $datos["pase_conducir"]; ?> <br>
		Seguridad social: <?php echo $datos["seguro_social"]; ?> <br>
		Residencia: <?php echo $datos["direccion"]; ?>. <?php echo $datos["ciudad_recidencia"]; ?>,  <?php echo $paisr["pais"]; ?><br>

		E-mail: <?php echo $datos["email"]; ?> <br>

		Teléfonos: <?php echo $datos["telefono"]; ?> <br>
	</div><br>	<br>
	</div>	
	
	<br><br><br><br><button class="btn btn-info" onclick="imprimir()">Imprimir</button><br><br>
	<a href="bienvenido.php" class="btn btn-success">Volver</a>

	<script>
		function imprimir(){
			window.print();
		}


	</script>
</body>
</html>