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

   <div id="banner-area" class="banner-area" style="background-image:url(images/planta.jpg)">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title" style="color: #D50C0C;">Sindicato de Ciudadadanos de "La Tierra"</h1>
                    
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 


   <section id="main-container" class="main-container">
      <div class="container" align="center">
        
		<div class="col-sm-6">
			<h4>Documento explicativo</h4>
			<a href="PDF/donaciones.pdf" target="_blank"><img src="images/pdf.png" alt="" class="img-responsive" width="200"></a>
		</div>
		<div class="col-sm-6">
			<h4>Click en el siguiente botón para donar</h4><br><br><br>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick" />
				<input type="hidden" name="hosted_button_id" value="6ZSZ547X9S7PG" />
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
				<img alt="" border="0" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="100" height="1" />
			</form>
		</div>

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
	 	$("#donaciones").addClass("active_m");
	 </script>

</div><!-- Body inner end -->
</body>

</html>