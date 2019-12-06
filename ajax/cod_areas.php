<?php 
	include("../conexion/conexion.php"); 

	$sql_datos = "SELECT cod_area FROM paises WHERE id='".$_POST["pais"]."'";

    $req_datos = $bdd->prepare($sql_datos);
    $req_datos->execute();

    $datos = $req_datos->fetch();

    echo $datos["cod_area"];

 ?>