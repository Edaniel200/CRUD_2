<!DOCTYPE html>
<html>
<head>

	<title>CRUD | ARCHIVOS DISTRIBUIDOS</title>

	<meta charset="utf-8">
	<meta name="description" content="crud basado en la distribucion de archivos para una mejor legibilidad y matenimieto de este.">
	<meta name="keywords" content="crud, registros, archivos distribuidos">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Lato:wght@300&family=Merriweather:wght@300&family=Montserrat:wght@200&family=Noto+Sans&family=Noto+Serif&family=Nunito+Sans:wght@200&family=Open+Sans:wght@300&family=Oswald:wght@200&family=PT+Sans&family=Prompt:wght@200&family=Raleway:wght@200&family=Roboto:wght@300&family=Slabo+27px&family=Source+Sans+Pro:wght@200&family=Work+Sans:wght@200;400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/formulario.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		
	<script src="https://www.google.com/recaptcha/api.js?render=6LcbarMbAAAAAAOEZIGtcD7vfIFPGnVeynGWV4tH"></script>

   <script>
   		$(document).ready(function(){

   			$("#enviar").click(function(){

   				grecaptcha.ready(function() {

		        grecaptcha.execute('6LcbarMbAAAAAAOEZIGtcD7vfIFPGnVeynGWV4tH',
		        	{action: 'validarUsuario'})
		        	.then(function(token) {
		        		if(verifyData($("#form_insertar"))){

			        		$("#form_insertar").prepend(`<input type="hidden" name="token" value="${token}">`);
			        		$("#form_insertar").prepend(`<input type="hidden" name="action" value="validarUsuario">`);
			        		$("#form_insertar").submit();

		        		}
		          });

		        });

   			});	

   		});

  </script>
  <script type="text/javascript" src="js/funcionalidad.js"></script>

</head>
<body>
	<script type="text/javascript"></script>
	<header>
		<h1>CRUD</h1>
	</header>
	<?php 

		if(isset($_GET['sms'])){

			$values = json_decode($_GET['sms']);

			echo !preg_match('/script/', $values->data) && preg_match('/(exi|dan)/',$values->state) ?
				"<p class='" . $values->state . "'>" . $values->data. "</p>" :
				"<p class='dan'>Por favor no intente hackearme</p>";

		}
		

		include("consultas/select.php");

	 ?>

	 <section>
	 	
		<table>
			<tr>
				<th colspan="4">Datos</th>
			</tr>

			<?php  $CONSULTA = new SELECT("SELECT * FROM usuario");	?>

		</table>

		<div>
			<div>
				<h2>Inserte los datos</h2>
			</div>

			<form method="POST" action="procesar/" id="form_insertar">

				<input type="text" name="usuario" placeholder="USUARIO" id="usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{2,}">
				<input type="password" name="contrasena" placeholder="CONTRASEÑA" pattern="[a-zA-Z0-9&^_%$€]{2,}">
				<!-- 
				 <button class="g-recaptcha" 
			        data-sitekey="6Le_5qwbAAAAACFCQe3gmYHfrK1XNs7yt2dB6osX" 
			        data-callback='onSubmit' 
			        data-action='submit'>Submit</button> -->
			        <button type="button" name="enviar" id="enviar">Insertar</button>

			</form>

		</div>

	 </section>

</body>
</html>