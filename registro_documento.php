<?php include("conexion/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Sindicato de Ciudadanos en la Tierra</title>

	<!-- Mobile Specific Metas
	================================================== -->

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

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<?php include("header.html"); ?>

   <div id="banner-area" class="banner-area" style="background-image:url(images/gente1.jpg)">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title" style="color: #03DE2C;">Sindicato de Ciudadadanos de "La Tierra"</h1>
                    
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 


   <section id="main-container" class="main-container">
      <div class="container" align="center">
        <h3>Paso 1: Registrese</h3>
		    <form  action="php/registro.php" method="POST" role="form" name="registro" id="registro">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nombre">Nombre</label>
                <input class="form-control" name="nombre" id="nombre" placeholder="" type="text" required>
            </div>
          </div> 

          <div class="col-sm-6">
            <div class="form-group">
              <label for="apellido">Apellido</label>
                <input class="form-control " name="apellido" id="apellido" placeholder="" type="text" required>
            </div>
          </div> 

          <div class="col-sm-6">
            <div class="form-group">
              <label for="pais">Pais nacimiento</label>
              <select name="pais" id="pais" class="form-control" required>
                <option value="">Elegir</option>
              <?php 

                $sql_paises = "SELECT * FROM paises";

                $req_paises = $bdd->prepare($sql_paises);
                $req_paises->execute();

                $paises = $req_paises->fetchAll();
                
                foreach ($paises as $pais) {

                  echo"<option value='".$pais["id"]."'>".$pais["pais"]."</option>";
                  
                }

              ?>
              </select>
            </div>
          </div> 

          <div class="col-sm-6">
            <div class="form-group">
              <label for="ciudad">Ciudad nacimiento</label>
                <input class="form-control" name="ciudad" id="ciudad" placeholder="" type="text" required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="email">E-mail</label>
                <input class="form-control" name="email" id="email" placeholder="" type="email" required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="clave">Contraseña</label>
                <input class="form-control" name="clave" id="clave" placeholder="" type="password" required>
            </div>
            </div>
            <div class="col-sm-4">
            <div class="form-group">
              <label for="clave2">Confirmar contraseña</label>
                <input class="form-control" name="clave2" id="clave2" placeholder="" type="password" required>
            </div>
          </div> 
         <input type="checkbox" required> Acepto la <a href="PDF/proteccion_datos.pdf" target="_blank">Política de proteccion de datos</a><br><br>
          <button class="btn btn-primary">Registrar</button>
        </form>

      </div><!-- Conatiner end -->
   </section><!-- Main container end -->
	

   <?php include("footer.html"); ?>


  <!-- Javascript Files
================================================== -->

  <!-- initialize jQuery Library -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <!-- Bootstrap jQuery -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- Owl Carousel -->
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <!-- Color box -->
  <script type="text/javascript" src="js/jquery.colorbox.js"></script>
  <!-- Isotope -->
  <script type="text/javascript" src="js/isotope.js"></script>
  <script type="text/javascript" src="js/ini.isotope.js"></script>


  <!-- Google Map API Key-->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <!-- Google Map Plugin-->
  <script type="text/javascript" src="js/gmap3.js"></script>

 <!-- Template custom -->
 <script type="text/javascript" src="js/custom.js"></script>

 <script>
 
  var clave = registro.clave;
  var clave2 = registro.clave2;
  var validar= function validar(e) {
    var registro = document.registro;
   
    if (clave.value != clave2.value) {
      alert("las contraseñas no coinciden vuelva a introducirlas");
      e.preventDefault()
    }
    largopass = registro.clave.value.length;
            if(largopass < 6){
                alert("La contraseña debe ser al menos de 6 caracteres.");
                registro.clave.focus();
                 e.preventDefault()
            }
  }
    registro.addEventListener("submit", validar);
 </script>
 <script>
    $("#obten").addClass("active_m");
   </script>

</div><!-- Body inner end -->
</body>

</html>