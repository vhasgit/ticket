<?php

$datodb = array("tabla"=>"tickets","usuario"=>"root","pass"=>"Pasa4612");

function limpiar($datos){
	$datos = trim($datos); // elimina espacios en blanco al inicio y final del texto
	$datos = stripslashes($datos); // quita barras /
	$datos = htmlspecialchars($datos); // 
	return $datos;
}

function conexion($tabla, $usuario, $pass){
	try {
		$conexion = new PDO("mysql:host=localhost;dbname=$tabla", $usuario, $pass);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}

function comprobarSession(){
	if (!isset($_SESSION['admin'])) 
		header('Location: ' .  RUTA);
	}

function pagina_actual (){
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;

}

function contartickets($conexion){
	if (!isset($_GET['filtro'])) {
	$sentencia = $conexion->prepare("SELECT * FROM tickets WHERE estatus LIKE 1");
	$sentencia ->execute();
	$total_tickets = $sentencia->rowCount();
	return $total_tickets;
} elseif (isset($_GET['filtro'])) {
	$filtro = $_GET['filtro'];
	$sentencia = $conexion->prepare ("SELECT * FROM tickets WHERE estatus LIKE '$filtro'");
	$sentencia ->execute();
	$total_tickets = $sentencia->rowCount();
	return $total_tickets;
	}

}

function num_paginas($total_tickets,$porpagina){
	$num_paginas = $total_tickets/$porpagina;
	return $num_paginas;
}


function obtener_ticket($ticket_por_pagina, $conexion) {
	if (!isset($_GET['filtro'])) {
		$inicio = (pagina_actual() > 1) ? pagina_actual() * $ticket_por_pagina - $ticket_por_pagina : 0;
		$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tickets WHERE estatus LIKE '1' LIMIT $inicio, $ticket_por_pagina");
		$sentencia ->execute();
		return $sentencia->fetchAll();
	} 
	elseif (isset($_GET['filtro'])) {
		$filtro = $_GET['filtro'];
		$inicio = (pagina_actual() > 1) ? pagina_actual() * $ticket_por_pagina - $ticket_por_pagina : 0;
		$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tickets WHERE estatus LIKE '$filtro' LIMIT $inicio, $ticket_por_pagina");
		$sentencia ->execute();
		return $sentencia->fetchAll();

	}
}

function estatus($resultado,$conexion){
	$estatus = $conexion->prepare("SELECT * FROM estatus WHERE id = $resultado LIMIT 1");
	$estatus->execute();
	return $estatus->fetch();
}

function actualizar_estatus($conexion){
	$estatus = $conexion->prepare("SELECT * FROM estatus");
	$estatus->execute();
	return $estatus->fetchAll();
}
?>