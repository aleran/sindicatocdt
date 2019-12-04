<?php session_start();
require_once('conexion/conexion.php'); ?>
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
	<link href="js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
                     <h1 class="banner-title" style="color: #000;">Sindicato de Ciudadadanos de "La Tierra"</h1>
                    
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 

	<?php include("barra_usuario2.php"); ?>
   <section id="main-container" class="main-container">
      <div class="container" align="center">
        
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                        <tr>
                            <th>Documento</th>
                            <th>Pais</th>
                            <th>Ciudad</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        
                        <?php 

                        	 $sql_datos = "SELECT * FROM datos_personales p JOIN datos_complem c ON p.num_documento=c.num_documento";

          					$req_datos = $bdd->prepare($sql_datos);
          					$req_datos->execute();

         					 $datos = $req_datos->fetchAll();

         					 foreach ($datos as $dato) {

         					 	$sql_paises = "SELECT pais FROM paises WHERE id='".$dato["pais"]."'";

					            $req_paises = $bdd->prepare($sql_paises);
					            $req_paises->execute();

					            $paises = $req_paises->fetch();

         					 	echo'<tr class="odd gradeX">';
		                  		echo '<td><a  target="_blank" href="documento.php?documento='.$dato["num_documento"].'">'.$dato["num_documento"].'</a></td>';
		                  		echo '<td>'.$paises["pais"].'</td>';
		                  		echo '<td>'.$dato["ciudad"].'</td>';
		                  		echo '<td>'.$dato["apellidos"].'</td>';
		                  		echo '<td>'.$dato["nombres"].'</td>';
		                  		if ($dato["sexo"] ==1) {
		                  			echo '<td>'."M".'</td>';
		                  		}else{
		                  			echo '<td>'."F".'</td>';
		                  		}
		                  		
		                  		echo '</tr>';
         					 }

		                  	
                             
                                            
                                         ?>
                                        
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>

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
 <script src="js/dataTables/jquery.dataTables.js"></script>
 <script src="js/dataTables/dataTables.bootstrap.js"></script>
 <script>
 	$(document).ready(function () {
                $('#dataTables-example').dataTable({
                	"language": {
			            "lengthMenu": "Display _MENU_ registros por página",
			            "zeroRecords": "Nada encontrado, lo siento",
			            "info": "Mostrando página _PAGE_ de _PAGES_",
			            "infoEmpty": "No hay registros disponibles",
			            "infoFiltered": "(filtrado de _MAX_ registros en total )",
			            "search": "Buscar&nbsp;:",
			             paginate: {
				            first:"Primero",
				            previous:"Anterior",
				            next:"Siguiente",
				            last:"Último"
				        }
        			}
                });
            });
 </script>

</div><!-- Body inner end -->
</body>

</html>