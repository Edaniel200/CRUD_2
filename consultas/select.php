<?php 

	include("conexion/conexion.php");



	class SELECT extends CONEXION{
		public $SQL = '';
		public $RESULTADO = '';
		//public $ = '';

		public function SELECT($sql){

			parent::CONEXION();
			$this->SQL = $sql;

			$resultado =mysqli_query($this->CONEXION_, $sql);

			while($registro = $resultado->fetch_assoc()){
				echo '			<tr>
				<td>'. $registro["ID"] .'</td>
				<td>'.$registro["USERS"].' </td>
				<td><a href=\'consultas/proceso_update.php?data='.json_encode(array("id"=>$registro["TOKEN"], "usuario"=>$registro["USERS"])).'\'><button class="fas fa-pen"></button></a></td>

				<td><a href="consultas/delete.php?ID='.$registro["TOKEN"].'"><button class="fas fa-trash-alt"></button></a></td>
			</tr>


';
			}


				//<td><a href="consultas/update.php?ID='.$registro["ID"].'"><button>Actualizar</button></a></td>


			//return $this->RESULTADO;
		}


	}

 ?>