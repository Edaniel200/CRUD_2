<?php 

	include("../conexion/conexion.php");


	class UPDATE extends CONEXION{


		public function UPDATE(){


			$SQL = "UPDATE usuario SET USERS = :US, CONTRASENA = :CONTRA WHERE TOKEN = :TOKEN";

			$usuario =$_POST['usuario'];

			$contrasena = $_POST['contrasena'];

			$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

			$id = $_POST['id'];

			$CONEXION_pdo = new CONEXION();

			$mensaje = $CONEXION_pdo->CONEXION_PDO($SQL,$usuario, $contrasena, $id);


			header("Location: ../index.php".$mensaje);


		}

	}

	if(preg_match('/^[a-zA-Z0-9&^_%$€]{2,}$/', $_POST['contrasena'])){

		new UPDATE();

	}else{

		$mensaje = "?sms=" . json_encode(array("data"=>"No se permiten < > en contraseña", "state"=>"dan"));

		header("Location:../index.php{$mensaje}");

	}



 ?>