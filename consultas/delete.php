<?php 

include("../conexion/conexion.php");


class DELETE extends CONEXION{
	
	public $SQL = "DELETE FROM usuario WHERE TOKEN = ?";


	public function DELETE($dato){

		parent::CONEXION();

		$PREPARACION = mysqli_prepare($this->CONEXION_ , $this->SQL);

		$ok = mysqli_stmt_bind_param($PREPARACION, "s", $dato);

		$ok = mysqli_stmt_execute($PREPARACION);


		$ok ? $mensaje = "?sms=" . json_encode(array("data"=>"Registro eliminado", "state"=>"exi")) :
			$mensaje = "?sms=" . json_encode(array("data"=>"No se pudo eliminar el registro", "state"=>"dan"));



		header("Location: ../index.php{$mensaje}");

	}
}


new DELETE($_GET['ID']);




										

 ?>