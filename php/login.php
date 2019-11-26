<?php
	require_once('../conexion/conexion.php');
	$pass=$_POST['clave'];
	$pass=md5($pass);
	echo $_POST["email"];
	$sql = "SELECT * FROM datos_personales WHERE email='".$_POST["email"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$num=$req->rowCount();
	if ($num < 1) echo "<script>alert('Correo no registrado');window.location='../form_login.php';</script>";
	$usuario = $req->fetch();
		
	if($pass==$usuario['clave']){
			session_start();
	    	// inicio la sesión
	    	$_SESSION["autentificado"]= "SI";
	    	//defino la sesión que demuestra que el usuario está autorizado
	    	$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
			$_SESSION['id']=$usuario['id'];
			$_SESSION['documento']=$usuario['num_documento'];
			
			header("location:../bienvenido.php");
	}
	else echo "<script>alert('Clave Invalida');window.location='../form_login.php';</script>";
	mysqli_close($mysqli);
?>