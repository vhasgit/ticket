<?php require ('views/header.php');
require 'funciones.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://use.fontawesome.com/bf6c076a27.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css\estilos.css">
	<title>Folio</title>
</head>

<body>

    <?php $folio=''; 
    $conexion = conexion("$datodb[tabla]", "$datodb[usuario]", "$datodb[pass]");
	if (!$conexion) {
	    echo "Error de conexion Llamar a sistemas";
		die;
	}
	$statement = $conexion->prepare("SELECT * FROM tickets ORDER BY folio DESC LIMIT 1");
	$statement->execute(array(':folio' => $folio));
	$folio = $statement->fetch();				
	// mail ("$folio[3]","Numero de Folio ".($folio[0]),"Se envio su Ticket al departamento de Sistemas, Falla Reportada ".($folio[6]));  ?>

	<div class="container">
        <div class="row">
            <div class="col">
                <button style="display:none" id="clickButton" type="submit" class="btn btn-primary justify-content-end" data-toggle="modal" data-target="#folio-ticket">Enviar</button>
                <div class="modal fade" id="folio-ticket" tabindex="-1" role="dialog" aria-labelledby="folio-ticket" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h2>Numero de Folio:</h2>
                                <h2><?php print_r ($folio['0']); ?></h2>                            
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var button = document.getElementById('clickButton');
        button.click()            
    </script>
</body>
</html>