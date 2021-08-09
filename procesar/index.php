<?php 
	include("../conexion/conexion.php");

	class INSERTAR extends CONEXION{


		public $SQL = "INSERT INTO usuario (USERS, CONTRASENA, TOKEN) VALUES(?,?,?)";


		public function INSERTAR($dato, $dato2){

			parent::CONEXION();

			define("CLAVE", "6LcbarMbAAAAAKMtBWrGtYHR34XEK6lTB7DRekDr");
			$token_captcha = $_POST['token'];
			$action_captcha = $_POST['action'];

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array("secret"=> CLAVE, "response"=>$token_captcha)));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($curl);

			curl_close($curl);

			$data = json_decode($response);

			if($data->success){

				$contrasena_segura = password_hash($dato2, PASSWORD_DEFAULT);
				$token_string = $dato . "+" . $dato2;
				$token = hash("SHA256", $token_string);

				$PREPARACION = mysqli_prepare($this->CONEXION_, $this->SQL);

				$ok = mysqli_stmt_bind_param($PREPARACION, "sss", $dato, $contrasena_segura, $token);

				$ok = mysqli_stmt_execute($PREPARACION);


				$ok ? $mensaje = "?sms=" . json_encode(array("data"=>"Registro agregado", "state"=>"exi")) :
					$mensaje = "?sms=" . json_encode(array("data"=>"No se pudo agregar el registro", "state"=>"dan"));


			}else{

				$mensaje = "?sms=" . json_encode(array("data"=>"Eres Un Robot", "state"=>"dan"));


			}

			header("Location: ../index.php{$mensaje}");

		}

	}



	if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{2,}$/', $_POST['usuario']) && preg_match('/^[a-zA-Z0-9&^_%$€]{2,}$/', $_POST['contrasena'])){


		new INSERTAR($_POST['usuario'], $_POST['contrasena']);


	}else{

		$mensaje = "?sms=" . json_encode(array("data"=>"No se permite el uso de < >", "state"=>"dan"));
		header("Location: ../index.php".$mensaje);


	}


?>