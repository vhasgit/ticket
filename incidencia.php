<?php
 
require 'funciones.php';

$conexion = conexion("$datodb[tabla]", "$datodb[usuario]", "$datodb[pass]");
if (!$conexion) {
  header('Location: error.php');
}


if (empty($_POST['usuario']) or empty($_POST['correo']) or empty($_POST['sucursal']) or empty($_POST['falla']) or empty($_POST['ip'])) {
	require ('error.php');

}else{ 
	$fecha_levantamiento = ($_POST['fecha_levantamiento']);
	$usuario = limpiar($_POST['usuario']);
	$correo = filter_var(strtolower($_POST['correo']), FILTER_SANITIZE_EMAIL);
	$departamento = limpiar($_POST['departamento']);
	$ip = ($_POST['ip']);
	$sucursal = ($_POST['sucursal']);
    $falla = limpiar($_POST['falla']);
    

    
    $statement = $conexion->prepare("INSERT INTO tickets(fecha_levantamiento, usuario, correo, departamento, ip, sucursal, falla) 
	VALUES (:fecha_levantamiento, :usuario, :correo, :departamento, :ip, :sucursal, :falla)");
	$statement->execute(array(':fecha_levantamiento' => $fecha_levantamiento,
	':usuario' => $usuario, 
	':correo' => $correo, 
	':departamento' => $departamento, 
	':ip' => $ip, 
	':sucursal' => $sucursal, 
	':falla' => $falla));
     header('Location: folio.php');	
	}

if ((isset($_POST['solucion'])) or (isset($_POST['estatus'])) && (isset($_SESSION['usuario']))){
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$_POST['folio'];
		$solucion = ($_POST['solucion']);
		$folios = ($_POST['folio']);
		$estatus = ($_POST['estatus']);
		$errores = '';
		
		if ($errores == '' && !empty($estatus)){
			$statement = $conexion->prepare("UPDATE  tickets SET solucion = :solucion, estatus = :estatus WHERE folio = $folios");  
			$statement->execute(array(':solucion' => $solucion, ':estatus' => $estatus));
			if (isset($_POST)){
				if ($_POST['estatus'] == 3){				
					// mail ($_POST['correo'],"El folio ".$_POST['folio']." Fue Solucionado"," Falla Reportada".$_POST['falla']." Solucion por parte de sistemas ".$_POST['solucion']);
					header('Location: index.php');
				}else{
					// mail ($_POST['correo'],"Se actualizo tu folio".$_POST['folio'],"Estatus del ticket se marco como ". $_POST['estatus']);
					header('Location: index.php');
				}
			}					
		}
	}
}

		
?>

