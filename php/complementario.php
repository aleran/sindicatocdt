<?php 
	session_start();
	require_once('../conexion/conexion.php');
	echo $_SESSION['documento'];	

	$sql="UPDATE datos_personales set nombres='".$_POST["nombre"]."', apellidos='".$_POST["apellido"]."', fecha_nacimiento='".$_POST["fecha_n"]."', estatura='".$_POST["estatura"]."', color_piel='".$_POST["color_piel"]."', particular='".$_POST["particular"]."', foto='foto_" . "5" . ".png' WHERE num_documento='".$_SESSION['documento']."'";

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

	$sql="UPDATE datos_complem set tipo_sangre='".$_POST["sangre"]."', profesion='".$_POST["profesion"]."', universidad='".$_POST["universidad"]."', telefono='".$_POST["telefono"]."', pais_recidencia='".$_POST["pais_r"]."', ciudad_recidencia='".$_POST["ciudad_r"]."', direccion='".$_POST["direccion"]."', tipo_documento='".$_POST["tipo_documento"]."', documento_o='".$_POST["documento_o"]."', servicio_militar='".$_POST["servicio_m"]."', seguro_social='".$_POST["seguro_social"]."', pais_ss='".$_POST["pais_ss"]."', fecha_ss='".$_POST["fecha_ss"]."', observaciones='".$_POST["observaciones"]."' WHERE num_documento='".$_SESSION['documento']."'";

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


		//Ip del visitante
	if ($_SERVER['REMOTE_ADDR']=='::1') $ipuser= ''; else $ipuser= $_SERVER['REMOTE_ADDR'];

	$geoPlugin_array = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipuser) );


	//Obtener el pais
	//echo ' Pais: '.$geoPlugin_array['geoplugin_countryName'];

	 $sql_paises = "SELECT id FROM paises WHERE pais LIKE '%".$geoPlugin_array['geoplugin_countryName']."%'";

     $req_paises = $bdd->prepare($sql_paises);
     $req_paises->execute();

     $pais = $req_paises->fetch();
 

	$sql="UPDATE documentos set fecha='".date("Y-m-d")."', pais='".$pais["id"]."'WHERE numero='".$_SESSION['documento']."'";

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




	//header("location: ../registro_informacion.php?num=".$numeros."");
?>
