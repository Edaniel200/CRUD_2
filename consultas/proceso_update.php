<?php 
	
	$data = json_decode($_GET['data']);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EDITAR</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Lato:wght@300&family=Merriweather:wght@300&family=Montserrat:wght@200&family=Noto+Sans&family=Noto+Serif&family=Nunito+Sans:wght@200&family=Open+Sans:wght@300&family=Oswald:wght@200&family=PT+Sans&family=Prompt:wght@200&family=Raleway:wght@200&family=Roboto:wght@300&family=Slabo+27px&family=Source+Sans+Pro:wght@200&family=Work+Sans:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>


	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/funcionalidad.js"></script>
	
</head>
<body>
	<header>

		<h1>PROCESO DE ACTUALIZACI&OacuteN</h1>

	</header>

	<section>
		
			<form method="POST" action="update.php">


			 	<input type="text" name="usuario" placeholder="Nuevo Usuario" value="<?php echo $data->usuario; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{2,}" readonly>

			 	<input type="password" name="contrasena" placeholder="Nueva Contraseña"  pattern="[a-zA-Z0-9&^_%$€]{2,}">

			 	<input type="hidden" name="id" value="<?php echo $data->id; ?>" readonly>


			 	<button type="submit"  class="fas fa-pen" name="accion"></button>

			</form>

		
	</section>

</body>
</html>