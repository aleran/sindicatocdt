<?php include("conexion/conexion.php"); ?> ?>
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
  
  <style>
    @media only screen and (max-width: 700px) {
      video {
        max-width: 100%;
      }
    }
  </style>

</head>

<body>

	<?php include("header.html"); ?>

   <div id="banner-area" class="banner-area" style="background-image:url(images/banner/videos.jpg)">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">Registro</h1>
                    
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 


   <section id="main-container" class="main-container">
      <div class="container" align="center">
        <h3>Paso 1: Registrese</h3>
		  
        <h1>Selecciona un dispositivo</h1>
        <div>
          <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
          <button id="boton">Tomar foto</button>
          <p id="estado"></p>
        </div>
        <br>
        <video muted="muted" id="video"></video>
        <canvas id="canvas" style="display: none;"></canvas>
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
 <script src="js/script.js"></script>

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

</div><!-- Body inner end -->
</body>

</html>