<?php 
	require_once('../conexion/conexion.php');

	$sql_numero = "SELECT consecutivo FROM consecutivo";

    $req_numero = $bdd->prepare($sql_numero);
    $req_numero->execute();

    $numero = $req_numero->fetch();

    $contador=$numero["consecutivo"] + 1;

    if (strlen($contador )==1) {

		$numeros="000000000".$contador;

	}elseif (strlen($contador )==2) {
					
		$numeros="00000000".$contador;

	}elseif (strlen($contador) ==3) {
					
		$numeros="0000000".$contador;

	}elseif (strlen($contador) ==4) {
					
		$numeros="000000".$contador;

	}
	elseif (strlen($contador) ==5) {
					
		$numeros="00000".$contador;

	}
	elseif (strlen($contador) ==6) {
					
		$numeros="0000".$contador;

	}

	elseif (strlen($contador) ==7) {
					
		$numeros="000".$contador;

	}

	elseif (strlen($contador) ==8) {
					
		$numeros="00".$contador;

	}

	elseif (strlen($contador) ==9) {
					
		$numeros="0".$contador;

	}


	else{

		$numeros=$contador;
	}

	$sql="INSERT INTO datos_personales (num_documento,nombres,apellidos,pais,ciudad,email,clave) VALUES ('".$numeros."', '".$_POST["nombre"]."', '".$_POST["apellido"]."', '".$_POST["pais"]."', '".$_POST["ciudad"]."', '".$_POST["email"]."', '".md5($_POST["clave"])."')";

	$query = $bdd->prepare( $sql );

	if ($query == false) {
		print_r($bdd->errorInfo());
		die ('Erreur prepare');
	}

	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die ('Erreur execute');
	}

	$sql="INSERT INTO documentos (numero) VALUES ('".$numeros."')";

	$query = $bdd->prepare( $sql );

	if ($query == false) {
		print_r($bdd->errorInfo());
		die ('Erreur prepare');
	}

	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die ('Erreur execute');
	}




	$sql="INSERT INTO datos_complem (num_documento) VALUES ('".$numeros."')";

	$query = $bdd->prepare( $sql );

	if ($query == false) {
		print_r($bdd->errorInfo());
		die ('Erreur prepare');
	}

	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die ('Erreur execute');
	}

	$sql="UPDATE consecutivo set consecutivo='".$contador."'";

	$query = $bdd->prepare( $sql );

	if ($query == false) {
		print_r($bdd->errorInfo());
		die ('Erreur prepare');
	}

	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die ('Erreur execute');
	}



	require '../lib/PHPMailer/PHPMailerAutoload.php';
	include("correo_registro.php");
?>