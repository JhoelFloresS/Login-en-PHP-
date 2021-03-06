<?php

require_once "conexionBD.php";

class EmpleadosM extends conexionBD{

	static public function RegistrarEmpleadosM($datosC, $tablaBD){

		$pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, apellido, email, puesto, salario) values(:nombre, :apellido, :email, :puesto, :salario)");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
		$pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);


		if($pdo->execute()){

			return "Bien";
		}else{

			return "Error";
		}

		$pdo -> close();
	}



	//Mostrar empleados

	static public function MostrarEmpleadosM($tablaBD){

		$pdo = conexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD");

		$pdo ->execute();

		return $pdo -> fetchAll();

		$pdo -> close();

	}

	//editar empleado

	static public function EditarEmpleadoM($datosC, $tablaBD){

		$pdo = conexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD WHERE id=:id");

		$pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);

		$pdo -> execute();
		
		return $pdo->fetch();

		$pdo -> close();

	}
}

?>