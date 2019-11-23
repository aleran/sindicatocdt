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
   
      video {
        width: 15%;
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
        <h3>Paso 2: Complete los datos</h3>
        <?php   

          $sql_datos = "SELECT * FROM datos_personales WHERE num_documento='".$_GET["num"]."'";

          $req_datos = $bdd->prepare($sql_datos);
          $req_datos->execute();

          $datos = $req_datos->fetch();
                
         

        ?>
		    <form  action="php/complementario.php" method="POST" role="form" name="registro" id="registro">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nombre">Nombre</label>
                <input class="form-control" name="nombre" id="nombre" placeholder="" type="text" value="<?php  echo $datos["nombres"] ?>" required>
            </div>
          </div> 

          <div class="col-sm-6">
            <div class="form-group">
              <label for="apellido">Apellido</label>
                <input class="form-control " name="apellido" id="apellido" placeholder="" type="text" value="<?php  echo $datos["apellidos"] ?>" required>
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
                  if ( $pais["id"]== $datos["pais"] ) {
                      echo"<option value='".$pais["id"]."' SELECTED>".$pais["pais"]."</option>";
                  }else{
                    echo"<option value='".$pais["id"]."'>".$pais["pais"]."</option>";
                  }
                 
                  
                }

              ?>
              </select>
            </div>
          </div> 

          <div class="col-sm-6">
            <div class="form-group">
              <label for="ciudad">Ciudad nacimiento</label>
                <input class="form-control" name="ciudad" id="ciudad" placeholder="" type="text" value="<?php  echo $datos["ciudad"] ?>" required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="email">E-mail</label>
                <input class="form-control" name="email" id="email" placeholder="" type="email" value="<?php  echo $datos["email"] ?>" required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="fecha_n">Fecha de nacimiento</label>
                <input class="form-control" name="fecha_n" id="fecha_n" placeholder="" type="date"  required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="estatura">Estatura</label>
                <input class="form-control" name="estatura" id="estatura" placeholder="" type="text"  required>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="color_piel">Color de piel</label>
                <input class="form-control" name="color_piel" id="color_piel" placeholder="" type="text"  required>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="coparticular">Señales particulares</label>
                <input class="form-control" name="particular" id="coparticular" placeholder="" type="text"  required>
            </div>
          </div> 

          
          
       
          <div class="col-sm-12">
            <h4>Selecciona Camara</h4>
            <div>
              <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
             
              <p id="estado"></p>
            </div>
            <br>
            <video muted="muted" id="video"></video>
            <canvas id="canvas" style="display: none;"></canvas>
            <br><br><button id="boton" class="btn btn-success">Tomar foto</button><br>  <br>  <br>  
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="sangre">Grupo sanguineo</label>
                 <select name="sangre" id="sangre" class="form-control" required>
                <option value="">Elegir</option>
              <?php 

                $sql_sangres = "SELECT * FROM grupos_s";

                $req_sangres = $bdd->prepare($sql_sangres);
                $req_sangres->execute();

                $sangres = $req_sangres->fetchAll();
                
                foreach ($sangres as $sangre) {
                
                    echo"<option value='".$sangre["id"]."'>".$sangre["grupo_s"]."</option>";
                  
                 
                  
                }

              ?>
              </select>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="profesion">Profesion</label>
                <input class="form-control" name="profesion" id="profesion" placeholder="" type="text"  required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="universidad">Universidad</label>
                <input class="form-control" name="universidad" id="universidad" placeholder="" type="text"  required>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="telefono">Teléfono</label>
                <input class="form-control" name="telefono" id="telefono" placeholder="" type="tel"  required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="pais_r">Pais de residencia</label>
                <select name="pais_r" id="pais_r" class="form-control" required>
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

          <div class="col-sm-4">
            <div class="form-group">
              <label for="ciudad_r">Ciudad de residencia</label>
                <input class="form-control" name="ciudad_r" id="ciudad_r" placeholder="" type="text"  required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="direccion">Dirección de residencia</label>
                <input class="form-control" name="direccion" id="direccion" placeholder="" type="text"  required>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="tipo_documento">Tipo de documento</label>
                <select name="tipo_documento" id="tipo_documento" class="form-control" required>
                <option value="">Elegir</option>
              <?php 

                $sql_documentos = "SELECT * FROM tipos_docs";

                $req_documentos = $bdd->prepare($sql_documentos);
                $req_documentos->execute();

                $documentos = $req_documentos->fetchAll();
                
                foreach ($documentos as $documento) {
                  
                  echo"<option value='".$documento["id"]."'>".$documento["tipo_doc"]."</option>";
                  
                 
                  
                }

              ?>
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="documento_o">Número de documento</label>
                <input class="form-control" name="documento_o" id="documento_o" placeholder="" type="text"  required>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="servicio_m">Servicio Militar</label>
                <select name="servicio_m" id="servicio_m" class="form-control" required>
                <option value="">Elegir</option>
              
                <option value='1'>SI</option>
                <option value='0'>NO</option>
                  
                 
                  
          
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="seguro_social">Seguro Social</label>
                <input class="form-control" name="seguro_social" id="seguro_social" placeholder="" type="text"  required>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="pais_ss">Pais Sseguro social</label>
                <select name="pais_ss" id="pais_ss" class="form-control" required>
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

          <div class="col-sm-4">
            <div class="form-group">
              <label for="fecha_ss">Fecha seguro social</label>
                <input class="form-control" name="fecha_ss" id="fecha_ss" placeholder="" type="date"  required>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="observaciones">Observaciones</label>
                <input class="form-control" name="observaciones" id="observaciones" placeholder="" type="text"  required>
            </div>
          </div>  

      </div><!-- Conatiner end -->
      <button class="btn btn-primary">Registrar</button>
    </form>
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