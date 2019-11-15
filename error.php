<html>
<header><?php require 'views/header.php'; ?></header>
<body>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<div class="container">
		<?php if (isset($resultado) && !empty($_GET['busqueda'])) : ?>
			<h2> <?php echo $folio = 'Sin Resultados para la busqueda de: '; ?></h2><h3><?php echo $busqueda;?></h3>			
		<?php endif ?>

		<?php if (isset($_POST['fecha_levantamiento'])): ?>
			<h2><?php echo $errores = 'Por Favor Rellena los Campos de:'; ?></h2><br>
			<h3>Usuario, Correo, Sucursal, Falla e IP</h3>			
		<?php endif ?>
	</div>
</body>
</html>