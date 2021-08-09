<?php 
	class CONEXION{
		public $CONEXION_ = '';
		public $CONEXION_PDO_ = '';


		public function CONEXION($host = "localhost", $user = "root", $contrasena = "", $data_base = "usuarios"){

			$this->CONEXION_ = mysqli_connect($host, $user, $contrasena, $data_base);


			if($this->CONEXION_->connect_errno){

				echo "<p style='color:white; background-color:red;'>Ha ocurrido un percanse</p>";

			}


		}
		public function CONEXION_PDO($sql, $usuario, $contrasena, $id){
			try{

				$this->CONEXION_PDO_ = new PDO("mysql:host=localhost; dbname=usuarios", "root", "");
				$this->CONEXION_PDO_->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->CONEXION_PDO_->exec("SET CHARACTER SET UTF8");




				$PREPARACION = $this->CONEXION_PDO_->prepare($sql);


				$PREPARACION->execute(array(":US"=>$usuario, ":CONTRA"=>$contrasena, ":TOKEN"=>$id));




				$PREPARACION->rowCount() > 0 ?	
					$mensaje = "?sms=" . json_encode(array("data"=>"Registro actualizado", "state"=>"exi"))	:
					$mensaje = "?sms=" . json_encode(array("data"=>"No se pudo actualizar el registro", "state"=>"dan"));
			

				return $mensaje;


			}catch(Exception $err){

				echo "Error:	" . $err->getMessage();

			}

		}


		public function cerrar_conexion(){

			mysqli_close($this->CONEXION_);

		}
	}




?>