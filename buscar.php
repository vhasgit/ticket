<?php session_start();
require 'funciones.php';

$conexion = conexion("$datodb[tabla]", "$datodb[usuario]", "$datodb[pass]");
if (!$conexion) {
  header('Location: error.php');
}



if ($_SERVER['REQUEST_METHOD'] == 'GET' or !empty($_GET['busqueda'])){
 	$busqueda = limpiar($_GET['busqueda']);
 	$statement = $conexion->prepare('SELECT * FROM tickets WHERE folio LIKE :busqueda');
 	$statement->execute(array(':busqueda' => "$busqueda")); 
 	$resultado = $statement->fetch();

	if (isset($_SESSION['usuario']) && (!empty($resultado))){
		require ('views/solucion.view.php');
    
  
	}else{
	if (empty($resultado)){		
		header('Location: index.php');
		}else{
	 		require ('views/mostrar.view.php');
		 	}
		}
}

?>