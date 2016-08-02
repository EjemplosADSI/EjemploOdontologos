<?php

require_once (__DIR__.'/../Modelo/Odontologos.php');

if(!empty($_GET['action'])){
	odontologos_controller::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class odontologos_controller{
	
	static function main($action){
		if ($action == "crear"){
            odontologos_controller::crear();
		}else if ($action == "editar"){
            odontologos_controller::editar();
		}else if ($action == "buscarID"){
            odontologos_controller::buscarID(1);
		}
	}
	
	static public function crear (){
		try {
			$arrayOdonto = array();
			$arrayOdonto['nombres'] = $_POST['nombres'];
			$arrayOdonto['apellidos'] = $_POST['apellidos'];
			$arrayOdonto['especialidad'] = $_POST['especialidad'];
			$arrayOdonto['direccion'] = $_POST['direccion'];
			$arrayOdonto['celular'] = $_POST['celular'];
            $arrayOdonto['user'] = $_POST['user'];
			$arrayOdonto['pass'] = $_POST['pass'];
			$arrayOdonto['estado'] = "Activo";
			$odonto = new Odontologos ($arrayOdonto);
            $odonto->insertar();
			header("Location: ../Vista/crearOdontologo.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../Vista/crearOdontologo.php?respuesta=error");
		}
	}
	
	static public function editar (){
		try {
			$arrayOdonto = array();
            $arrayOdonto['nombres'] = $_POST['nombres'];
            $arrayOdonto['apellidos'] = $_POST['apellidos'];
            $arrayOdonto['especialidad'] = $_POST['especialidad'];
            $arrayOdonto['direccion'] = $_POST['direccion'];
            $arrayOdonto['celular'] = $_POST['celular'];
            $arrayOdonto['user'] = $_POST['user'];
            $arrayOdonto['pass'] = $_POST['pass'];
            $arrayOdonto['estado'] = $_POST['estado'];
			$arrayOdonto['idodontologos'] = $_POST['idodontologos'];
            $odonto = new Odontologos ($arrayOdonto);
            $odonto->editar();
			header("Location: ../crearOdontologo.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../crearOdontologo.php?respuesta=error");
		}
	}
	
	static public function buscarID ($id){
		try { 
			return Odontologos::buscarForId($id);
		} catch (Exception $e) {
			header("Location: ../buscarOdontologos.php?respuesta=error");
		}
	}
	
	public function buscarAll (){
		try {
			return Odontologos::getAll();
		} catch (Exception $e) {
			header("Location: ../buscarOdontologos.php?respuesta=error");
		}
	}

	public function buscar ($campo, $parametro){
		try {
			return Odontologos::getAll();
		} catch (Exception $e) {
			header("Location: ../buscarOdontologos.php?respuesta=error");
		}
	}
	
}
?>