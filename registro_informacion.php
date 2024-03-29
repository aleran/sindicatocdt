<?php include("conexion/conexion.php"); 
  session_start()
?>
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
    <?php include("barra_usuario.php"); ?>

   <section id="main-container" class="main-container">
      <div class="container" align="center">
        <h3>Paso 2: Complete los datos</h3>
        <?php   

          if ($_SESSION["documento"]) {
            
            $num_d=$_SESSION["documento"];

          }else{

               $num_d=$_GET["num"];

          }

          $sql_datos = "SELECT * FROM datos_personales p JOIN datos_complem c ON p.num_documento=c.num_documento WHERE c.num_documento='".$num_d."'";

          $req_datos = $bdd->prepare($sql_datos);
          $req_datos->execute();

          $datos = $req_datos->fetch();
                
         

        ?>
		    <form  action="php/complementario.php" method="POST" role="form" name="registro" id="registro">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nombre">Nombres completos</label>
                <input class="form-control" name="nombre" id="nombre" placeholder="" type="text" value="<?php  echo $datos["nombres"] ?>" required>
            </div>
          </div> 

          <div class="col-sm-6">
            <div class="form-group">
              <label for="apellido">Apellidos completos</label>
                <input class="form-control " name="apellido" id="apellido" placeholder="" type="text" value="<?php  echo $datos["apellidos"] ?>" required>
            </div>
          </div> 

          <div class="col-sm-6">
            <div class="form-group">
              <label for="pais">País nacimiento</label>
              <select name="pais" id="pais" class="form-control" required>
                <option value="">Elegir</option>
              <?php 

                $sql_paises = "SELECT * FROM paises ORDER BY pais";

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
                <input class="form-control" name="fecha_n" id   ="fecha_n" placeholder="" type="date"    value="<?php  echo $datos["fecha_nacimiento"] ?>"required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="estatura">Estatura en Centimetros (Cm)</label>
                <input class="form-control" name="estatura" id="estatura" placeholder="" type="text"  value="<?php  echo $datos["estatura"] ?>" required>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo" class="form-control" required>
                <option value="">Elegir</option>
                
                
                <?php 

                  if ( $datos["sexo"] == 1) {
                      echo"<option value='1' SELECTED>M</option>";
                      echo"<option value='o' >F</option>";
                  }else{
                     echo"<option value='0' SELECTED>F</option>";
                     echo"<option value='0'>M</option>";
                  }

                 ?>
               
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="color_piel">Color de piel</label>
                <input class="form-control" name="color_piel" id="color_piel" placeholder="" type="text"  value="<?php  echo $datos["color_piel"] ?>"  required>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="coparticular">Señales particulares</label>
                <input class="form-control" name="particular" id="coparticular" placeholder="" type="text"  value="<?php  echo $datos["particular"] ?>">
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
            <p>Tomar fotos sin gafas o algún objeto que o cubra la cara</p>
            <br><br><button type="button" id="boton" class="btn btn-success">Tomar foto</button><br>  <br>  <br>  
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="sangre">Grupo y RH sanguineo</label>
                 <select name="sangre" id="sangre" class="form-control" required>
                <option value="">Elegir</option>
              <?php 

                $sql_sangres = "SELECT * FROM grupos_s";

                $req_sangres = $bdd->prepare($sql_sangres);
                $req_sangres->execute();

                $sangres = $req_sangres->fetchAll();
                
                foreach ($sangres as $sangre) {
                    
                    if ( $sangre["id"]== $datos["tipo_sangre"] ) {
                           echo"<option value='".$sangre["id"]."' SELECTED>".$sangre["grupo_s"]."</option>";
                      }else{
                        echo"<option value='".$sangre["id"]."'>".$sangre["grupo_s"]."</option>";
                      }
                    
                  
                 
                  
                }

              ?>
              </select>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="profesion">Profesion</label>
                <input class="form-control" name="profesion" id="profesion" placeholder="" type="text"  value="<?php  echo $datos["profesion"] ?>" required>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="universidad">Universidad</label>
                <input class="form-control" name="universidad" id="universidad" placeholder="" type="text"  value="<?php  echo $datos["universidad"] ?>" required>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="fecha_grado">Fecha de grado</label>
                <input class="form-control" name="fecha_grado" id="fecha_grado" placeholder="" type="date"  value="<?php  echo $datos["fecha_grado"] ?>" required>
            </div>
          </div>

           <div class="col-sm-4">
            <div class="form-group">
              <label for="matricula_p">Matricula Profesional N°</label>
                <input class="form-control" name="matricula_p" id="matricula_p" placeholder="" type="text"  value="<?php  echo $datos["matricula_p"] ?>" required>
            </div>
          </div>

          

           <div class="col-sm-4">
            <div class="form-group">
              <label for="pais_r">País de residencia</label>
                <select name="pais_r" id="pais_r" class="form-control"  required>
                <option value="">Elegir</option>
              <?php 

                $sql_paises = "SELECT * FROM paises ORDER BY pais";

                $req_paises = $bdd->prepare($sql_paises);
                $req_paises->execute();

                $paises = $req_paises->fetchAll();
                
                foreach ($paises as $pais) {

                   if ( $pais["id"]== $datos["pais_recidencia"] ) {
                      echo"<option value='".$pais["id"]."' SELECTED>".$pais["pais"]."</option>";
                  }else{
                    echo"<option value='".$pais["id"]."'>".$pais["pais"]."</option>";
                  }
                  
                 
                  
                 
                  
                }

              ?>
              </select>
            </div>
          </div> 

          <div class="col-sm-4">
            <div class="form-group">
              <label for="ciudad_r">Ciudad de residencia</label>
                <input class="form-control" name="ciudad_r" id="ciudad_r" placeholder="" type="text"   value="<?php  echo $datos["ciudad_recidencia"] ?>" required>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="telefono">Teléfono Móvil</label>
              <div class="input-group">
                 <span class="input-group-addon cod_area"></span>
                <input class="form-control" name="telefono" id="telefono" placeholder="" type="tel"  value="<?php  echo $datos["telefono"] ?>" required>
              </div>
            </div>
          </div> 
          <div class="col-sm-4">
            <div class="form-group">
              <label for="telefono_f">Teléfono Fijo</label>
              <div class="input-group">
                 <span class="input-group-addon cod_area"></span>
                <input class="form-control" name="telefono_f" id="telefono_f" placeholder="" type="tel"  value="<?php  echo $datos["telefono_f"] ?>" required>
              </div>
            </div>
          </div> 

           <div class="col-sm-4">
            <div class="form-group">
              <label for="direccion">Dirección de residencia</label>
                <input class="form-control" name="direccion" id="direccion" placeholder="" type="text"  value="<?php  echo $datos["direccion"] ?>" required>
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

                   if ( $documento["id"]== $datos["tipo_documento"] ) {
                      echo"<option value='".$documento["id"]."' SELECTED>".$documento["tipo_doc"]."</option>";
                  }else{
                     echo"<option value='".$documento["id"]."'>".$documento["tipo_doc"]."</option>";
                  }
                   
                  
                }

              ?>
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="documento_o">Número de documento</label>
                <input class="form-control" name="documento_o" id="documento_o" placeholder="" type="text"  value="<?php  echo $datos["documento_o"] ?>" required>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="servicio_m">Servicio Militar</label>
                <select name="servicio_m" id="servicio_m" class="form-control" required>
                <option value="">Elegir</option>
               
                
                <?php 

                  if ( $datos["servicio_militar"] == 1) {

                      echo"<option value='1' SELECTED>SI</option>";
                      echo"<option value='0' >NO</option>";
                  }else{

                    echo"<option value='0' SELECTED>NO</option>";
                    echo"<option value='1'>SI</option>";
                  }

                 ?>
               
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="seguro_social">Seguro Social</label>
                <input class="form-control" name="seguro_social" id="seguro_social" placeholder=""  value="<?php  echo $datos["seguro_social"] ?>" type="text"  required>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="pais_ss">País Seguro social</label>
                <select name="pais_ss" id="pais_ss" class="form-control" required>
                <option value="">Elegir</option>
              <?php 

                $sql_paises = "SELECT * FROM paises ORDER BY pais";

                $req_paises = $bdd->prepare($sql_paises);
                $req_paises->execute();

                $paises = $req_paises->fetchAll();
                
                foreach ($paises as $pais) {

                  if ( $pais["id"]== $datos["pais_ss"] ) {
                       echo"<option value='".$pais["id"]."' SELECTED>".$pais["pais"]."</option>";
                  }else{
                       echo"<option value='".$pais["id"]."'>".$pais["pais"]."</option>";
                  }
                  
               
                  
                 
                  
                }

              ?>
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="fecha_ss">Fecha seguro social</label>
                <input class="form-control" name="fecha_ss" id="fecha_ss" placeholder="" type="date" value="<?php  echo $datos["fecha_ss"] ?>" required>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="pase_conducir">Pase de conducir</label>
                <select name="pase_conducir" id="pase_conducir" class="form-control" required>
                <option value="">Elegir</option>
               
                
                <?php 

                  if ( $datos["servicio_militar"] == 1) {

                      echo"<option value='1' SELECTED>SI</option>";
                      echo"<option value='0' >NO</option>";
                  }else{

                     echo"<option value='0' SELECTED>NO</option>";
                     echo"<option value='1' >SI</option>";
                  }

                 ?>
               
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="observaciones">Observaciones</label>
                <input class="form-control" name="observaciones" id="observaciones" placeholder=""  value="<?php  echo $datos["observaciones"] ?>" type="text">
            </div>
          </div>  

      </div><!-- Conatiner end -->
      <center><button class="btn btn-primary">Guardar</button></center>
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

  $('#pais_r').on('change',function(){
            var valor = $(this).val();
            
            var dataString = 'pais='+valor;
            $.ajax({

                url: "ajax/cod_areas.php",
                type: "POST",
                data: dataString,
                success: function (resp) {
               
                  $(".cod_area").text(resp);                        
                    //console.log(resp);
                    if(valor =="") {
                  $(".cod_area").text("");
                }
                },
                error: function (jqXHR,estado,error){
                    alert("error");
                    console.log(estado);
                    console.log(error);
                },
                complete: function (jqXHR,estado){
                    console.log(estado);
                }

                        
            })
                
        });
 
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