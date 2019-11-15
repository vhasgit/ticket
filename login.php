<?php session_start(); 

require ('funciones.php');

$errores = '';
// INDEX DEL LOGIN
if (isset($_SESSION['usuario'])){
	header('Location: index.php');
}
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING); // se limpia la variable de codigo y se pasa a minusculas obtenido por el usuario
	$password = $_POST['password']; // se obtiene lo tecleado por el usuario en password
	// $password = hash('sha512', $password); // se encripta la contraseña con el metod hash
    $conexion = conexion("$datodb[tabla]", "$datodb[usuario]", "$datodb[pass]");
    if (!$conexion) {
      header('Location: error.php');
    }
    
  


	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
	$statement->execute(array(':usuario' => $usuario,'password' =>$password));
	$resultado = $statement->fetch();


	
	if ($resultado !== false) {
		$_SESSION ['usuario'] = $usuario;
		header('location: index.php');
	} else{
		$errores .='<li>Datos incorrectos</li>';

	}
}


require 'views/login.view.php';

?>